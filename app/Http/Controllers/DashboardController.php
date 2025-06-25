<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Subscription;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $start = $this->parseStartDate($request);
            $end = $this->parseEndDate($request);

            $data = [
                'start' => $start,
                'end' => $end,
                'newSubscriptions' => $this->getNewSubscriptions($start, $end),
                'mrr' => $this->calculateMRR($start, $end),
                'reactivations' => $this->getReactivations($start, $end),
                'activeSubscriptions' => $this->getActiveSubscriptions(),
                ...$this->generateMonthlyChart($start, $end),
                ...$this->generateDailyChart($start, $end),
                ...$this->calculatePlanRevenue($start, $end)
            ];

            return view('dashboard.admin.index', $data);
        }

        $subscriptions = Subscription::with(['plan', 'mealTypes', 'deliveryDays'])
            ->where('user_id', auth()->id())
            ->orderByDesc('id')
            ->get();

        return view('dashboard.user.index', compact('subscriptions'));
    }

    public function subsTable()
    {
        $subscriptions = Subscription::with(['plan', 'mealTypes', 'deliveryDays'])
            ->where('status', 'active')
            ->orderBy('id', 'desc')
            ->get();

        $pausedSubscriptions = Subscription::where('status', 'paused')
            ->with(['plan', 'mealTypes', 'deliveryDays'])
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard.admin.table', compact('subscriptions', 'pausedSubscriptions'));
    }


    private function parseStartDate(Request $request)
    {
        return $request->start_date ? Carbon::parse($request->start_date) : now()->startOfMonth();
    }

    private function parseEndDate(Request $request)
    {
        return $request->end_date ? Carbon::parse($request->end_date) : now()->endOfMonth();
    }

    private function getNewSubscriptions($start, $end)
    {
        return Subscription::whereBetween('created_at', [$start, $end])->count();
    }

    private function getReactivations($start, $end)
    {
        return Subscription::whereNotNull('reactivated_at')
            ->whereBetween('reactivated_at', [$start, $end])
            ->count();
    }

    private function getActiveSubscriptions()
    {
        return Subscription::where('status', 'active')->count();
    }

    private function calculateMRR($start, $end)
    {
        return Subscription::where('status', 'active')
            ->whereDate('created_at', '<=', $end)
            ->where(function ($query) use ($start) {
                $query->whereNull('ended_at')->orWhereDate('ended_at', '>=', $start);
            })
            ->with(['plan', 'mealTypes', 'deliveryDays'])
            ->get()
            ->sum(function ($sub) {
                return $this->calculateSubscriptionValue($sub);
            });
    }

    private function generateMonthlyChart($start, $end)
    {
        $chartLabels = [];
        $chartData = [];

        $range = Carbon::parse($start)->startOfMonth()->monthsUntil(Carbon::parse($end)->endOfMonth());

        foreach ($range as $month) {
            $label = $month->format('M Y');
            $count = Subscription::where('status', 'active')
                ->whereDate('created_at', '<=', $month->endOfMonth())
                ->where(function ($query) use ($month) {
                    $query->whereNull('ended_at')->orWhereDate('ended_at', '>', $month->endOfMonth());
                })
                ->count();

            $chartLabels[] = $label;
            $chartData[] = $count;
        }

        return [
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
        ];
    }

    private function generateDailyChart($start, $end)
    {
        $dailyLabels = [];
        $dailyData = [];

        $dailyRange = Carbon::parse($start)->daysUntil($end);

        foreach ($dailyRange as $day) {
            $label = $day->format('d M');
            $count = Subscription::where('status', 'active')
                ->whereDate('created_at', '<=', $day)
                ->where(function ($query) use ($day) {
                    $query->whereNull('ended_at')->orWhereDate('ended_at', '>=', $day);
                })
                ->count();

            $dailyLabels[] = $label;
            $dailyData[] = $count;
        }

        return [
            'dailyLabels' => $dailyLabels,
            'dailyData' => $dailyData,
        ];
    }

    private function calculatePlanRevenue($start, $end)
    {
        $plans = Subscription::with(['plan', 'mealTypes', 'deliveryDays'])
            ->where('status', 'active')
            ->whereDate('created_at', '<=', $end)
            ->where(function ($query) use ($start) {
                $query->whereNull('ended_at')->orWhereDate('ended_at', '>=', $start);
            })
            ->get()
            ->groupBy(fn($sub) => $sub->plan->name ?? 'Unknown');

        $planLabels = [];
        $planRevenue = [];

        foreach ($plans as $planName => $subs) {
            $total = $subs->sum(function ($sub) {
                return $this->calculateSubscriptionValue($sub);
            });

            $planLabels[] = $planName;
            $planRevenue[] = round($total);
        }

        return [
            'planLabels' => $planLabels,
            'planRevenue' => $planRevenue,
        ];
    }

    private function calculateSubscriptionValue($sub)
    {
        $pricePerMeal = optional($sub->plan)->price_per_meal ?? 0;
        $mealCount = $sub->mealTypes->count();
        $dayCount = $sub->deliveryDays->count();
        $weeksInMonth = 4.3;

        return $pricePerMeal * $mealCount * $dayCount * $weeksInMonth;
    }
}
