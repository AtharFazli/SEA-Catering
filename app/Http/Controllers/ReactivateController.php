<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subscription;
use Illuminate\Http\Request;

class ReactivateController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start_date ? Carbon::parse($request->start_date) : now()->startOfMonth();
        $end = $request->end_date ? Carbon::parse($request->end_date) : now()->endOfMonth();

        $cancelledSubscriptions = Subscription::where('status', 'cancelled')
            ->with(['plan', 'mealTypes', 'deliveryDays'])
            ->whereBetween('ended_at', [$start, $end])
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard.admin.reactivate', compact(
            'cancelledSubscriptions',
            'start',
            'end'
        ));
    }

    public function reactivate($id)
    {
        $subscription = Subscription::where('id', $id)->firstOrFail();

        // Optional: Cek apakah user berhak mengubah (misalnya admin atau pemilik)
        if (auth()->user()->hasRole('admin') || $subscription->user_id == auth()->id()) {
            $subscription->status = 'active';
            $subscription->save();

            return back()->with('success', 'Subscription has been reactivated.');
        }

        return back()->with('error', 'Unauthorized action.');
    }
}
