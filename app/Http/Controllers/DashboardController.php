<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Admin bisa melihat semua, user hanya miliknya
        if ($user->hasRole('admin')) {
            $start = $request->start_date ? Carbon::parse($request->start_date) : now()->startOfMonth();
            $end = $request->end_date ? Carbon::parse($request->end_date) : now()->endOfMonth();

            $newSubscriptions = Subscription::whereBetween('created_at', [$start, $end])->count();

            $mrr = Subscription::where('status', 'active')
                ->whereDate('created_at', '<=', $end)
                ->where(function ($query) use ($start) {
                    $query->whereNull('ended_at')
                        ->orWhereDate('ended_at', '>=', $start);
                })
                ->with(['plan', 'mealTypes', 'deliveryDays'])
                ->get()
                ->sum(function ($sub) {
                    $pricePerMeal = optional($sub->plan)->price_per_meal ?? 0;
                    $mealCount = $sub->mealTypes->count();
                    $dayCount = $sub->deliveryDays->count();
                    return $pricePerMeal * $mealCount * $dayCount * 4.3;
                });



            $reactivations = Subscription::whereNotNull('reactivated_at')
                ->whereBetween('reactivated_at', [$start, $end])
                ->count();

            $activeSubscriptions = Subscription::where('status', 'active')->count();

            $chartLabels = [];
            $chartData = [];

            $range = \Carbon\CarbonPeriod::create($start->copy()->startOfMonth(), '1 month', $end->copy()->endOfMonth());

            foreach ($range as $month) {
                $label = $month->format('M Y');
                $count = Subscription::where('status', 'active')
                    ->whereDate('created_at', '<=', $month->endOfMonth())
                    ->where(function ($query) use ($month) {
                        $query->whereNull('ended_at')
                            ->orWhereDate('ended_at', '>', $month->endOfMonth());
                    })
                    ->count();

                $chartLabels[] = $label;
                $chartData[] = $count;
            }

            $dailyLabels = [];
            $dailyData = [];

            $dailyRange = \Carbon\CarbonPeriod::create($start, $end);

            foreach ($dailyRange as $day) {
                $label = $day->format('d M');
                $count = Subscription::where('status', 'active')
                    ->whereDate('created_at', '<=', $day)
                    ->where(function ($query) use ($day) {
                        $query->whereNull('ended_at')
                            ->orWhereDate('ended_at', '>=', $day);
                    })
                    ->count();

                $dailyLabels[] = $label;
                $dailyData[] = $count;
            }

            $plans = Subscription::with(['plan', 'mealTypes', 'deliveryDays'])
                ->where('status', 'active')
                ->whereDate('created_at', '<=', $end)
                ->where(function ($query) use ($start) {
                    $query->whereNull('ended_at')
                        ->orWhereDate('ended_at', '>=', $start);
                })
                ->get()
                ->groupBy(fn($sub) => $sub->plan->name ?? 'Unknown');

            $planLabels = [];
            $planRevenue = [];

            foreach ($plans as $planName => $subs) {
                $total = $subs->sum(function ($sub) {
                    $pricePerMeal = optional($sub->plan)->price_per_meal ?? 0;
                    return $pricePerMeal * $sub->mealTypes->count() * $sub->deliveryDays->count() * 4.3;
                });

                $planLabels[] = $planName;
                $planRevenue[] = round($total);
            }


            // return $planRevenue;
            return view('dashboard.admin.index', compact(
                'start',
                'end',
                'newSubscriptions',
                'mrr',
                'reactivations',
                'activeSubscriptions',
                'chartLabels',
                'chartData',
                'dailyLabels',
                'dailyData',
                'planLabels',
                'planRevenue'
            ));
        } else {
            $subscriptions = Subscription::with(['plan', 'mealTypes', 'deliveryDays'])
                ->where('user_id', auth()->id())
                ->orderBy('id', 'desc')
                ->get();
            return view('dashboard.user.index', compact('subscriptions'));
        }
    }


    public function subsTable()
    {
        $subscriptions = Subscription::with(['plan', 'mealTypes', 'deliveryDays'])
        ->where('status', '!=', 'cancelled')
            ->orderBy('id', 'desc')
            ->get();

            $cancelledSubscriptions = Subscription::where('status', 'cancelled')
            ->with(['plan', 'mealTypes', 'deliveryDays'])
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard.admin.table', compact('subscriptions', 'cancelledSubscriptions'));
    }

    public function exportCsv(Request $request): StreamedResponse
    {
        $subscriptions = Subscription::with(['plan', 'user'])
            ->whereBetween('created_at', [
                $request->start_date ?? now()->startOfMonth(),
                $request->end_date ?? now()->endOfMonth()
            ])
            ->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=subscriptions.csv",
        ];

        $columns = ['User Name', 'Email', 'Plan', 'Created At'];

        $callback = function () use ($subscriptions, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($subscriptions as $sub) {
                fputcsv($file, [
                    $sub->user->name ?? 'N/A',
                    $sub->user->email ?? 'N/A',
                    $sub->plan->name ?? 'N/A',
                    $sub->created_at->format('Y-m-d'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
