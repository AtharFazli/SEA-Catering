<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

    // Admin bisa melihat semua, user hanya miliknya
    if ($user->hasRole('admin')) {
        $subscriptions = Subscription::with(['user', 'plan', 'mealTypes', 'deliveryDays'])
            ->latest()
            ->get();
    } else {
        $subscriptions = $user->subscriptions()
            ->with(['plan', 'mealTypes', 'deliveryDays'])
            ->latest()
            ->get();
    }

    return view('dashboard.user.index', compact('subscriptions'));
    }
}
