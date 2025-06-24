<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReactivateController extends Controller
{
    public function index(Request $request)
    {
        $start = $this->parseStartDate($request);
        $end = $this->parseEndDate($request);

        $cancelledSubscriptions = Subscription::where('status', 'cancelled')
            ->with(['plan', 'mealTypes', 'deliveryDays'])
            ->whereBetween('ended_at', [$start, $end])
            ->orderByDesc('id')
            ->get();

        return view('dashboard.admin.reactivate', compact(
            'cancelledSubscriptions',
            'start',
            'end'
        ));
    }

    public function reactivate($id)
    {
        $subscription = Subscription::findOrFail($id);

        if (auth()->user()->hasRole('admin') || $subscription->user_id === auth()->id()) {
            $subscription->update(['status' => 'active']);

            return back()->with('success', 'Subscription has been reactivated.');
        }

        return back()->with('error', 'Unauthorized action.');
    }

    private function parseStartDate(Request $request)
    {
        return $request->start_date
            ? Carbon::parse($request->start_date)
            : now()->startOfMonth();
    }

    private function parseEndDate(Request $request)
    {
        return $request->end_date
            ? Carbon::parse($request->end_date)
            : now()->endOfMonth();
    }
}
