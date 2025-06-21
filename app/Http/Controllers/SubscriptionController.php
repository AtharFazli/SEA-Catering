<?php

namespace App\Http\Controllers;

use App\Models\MealType;
use App\Models\DeliveryDay;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
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
        $subscriptions = $user->Subscriptions()
            ->with(['plan', 'mealTypes', 'deliveryDays'])
            ->latest()
            ->get();
    }

    return view('dashboard.user.index', compact('subscriptions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'full_name'      => 'required|string|max:255',
            'phone_number'   => 'required|string|max:20',
            'plan'           => 'required|in:diet,protein,royal',
            'meal_types'     => 'required|array|min:1',
            'meal_types.*'   => 'in:breakfast,lunch,dinner',
            'delivery_days'  => 'required|array|min:1',
            'delivery_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'allergies'      => 'nullable|string'
        ]);

        // Simpan data ke subscriptions
        $subscription = Subscription::create([
            'user_id'     => Auth::id(),
            'plan_id'     => $this->getPlanId($request->plan),
            'phone_number' => $request->phone_number,
            'allergies'   => $request->allergies
        ]);

        // Simpan meal types
        $mealTypeIds = MealType::whereIn('name', $request->meal_types)->pluck('id');
        $subscription->mealTypes()->attach($mealTypeIds);

        // Simpan delivery days
        $dayIds = DeliveryDay::whereIn('name', $request->delivery_days)->pluck('id');
        $subscription->deliveryDays()->attach($dayIds);

        return redirect()->route('subscriptions')->with('success', 'Subscription created successfully!');
    }

    // Helper
    private function getPlanId($planSlug)
    {
        return match ($planSlug) {
            'diet'    => 1,
            'protein' => 2,
            'royal'   => 3,
            default   => null
        };
    }

    public function pause($id)
    {
        return view('dashboard.pause-modal', ['id' => $id]);
    }

    public function submitPause(Request $request)
    {
        // Simpan tanggal pause ke DB
    }

    public function cancel($id)
    {
        Subscription::findOrFail($id)->update(['status' => 'cancelled']);
        return back()->with('success', 'Langganan berhasil dibatalkan.');
    }
}
