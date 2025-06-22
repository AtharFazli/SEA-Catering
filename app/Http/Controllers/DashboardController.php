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
            ->orderBy('id', 'desc')
            ->get();
    } else {
        $subscriptions = Subscription::with(['plan', 'mealTypes', 'deliveryDays'])
        ->where('user_id', auth()->id())
        ->orderBy('id', 'desc')
        ->get();

    }

    // return $subscriptions;
    return view('dashboard.user.index', compact('subscriptions'));
    }
}
