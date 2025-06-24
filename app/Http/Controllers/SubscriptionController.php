<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\MealType;
use App\Models\DeliveryDay;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('user.subs');
    }
    
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'full_name'         => 'required|string|max:255',
            'phone_number'      => 'required|string|max:20',
            'province'          => 'required|string',
            'city'              => 'required|string',
            'district'          => 'required|string',
            'sub_district'      => 'required|string',
            'postal_code'       => 'required|integer',
            'street_address'    => 'required|string',
            'plan'              => 'required|in:diet,protein,royal',
            'meal_types'        => 'required|array|min:1',
            'meal_types.*'      => 'in:breakfast,lunch,dinner',
            'delivery_days'     => 'required|array|min:1',
            'delivery_days.*'   => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'allergies'         => 'nullable|string'
        ]);


        $subscription = Subscription::create([
            'user_id'           => Auth::id(),
            'plan_id'           => $this->getPlanId($request->plan),
            'phone_number'      => $request->phone_number,
            'province'          => $request->province,
            'city'              => $request->city,
            'district'          => $request->district,
            'sub_district'      => $request->sub_district,
            'postal_code'       => $request->postal_code,
            'street_address'    => $request->street_address,
            'allergies'         => $request->allergies
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

    public function submitPause(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'pause_start' => 'required|date|after_or_equal:today',
            'pause_end' => 'required|date|after_or_equal:pause_start',
        ]);

        $subscription = Subscription::findOrFail($request->subscription_id);

        // Simpan ke kolom jika sudah disiapkan
        $subscription->pause_start = Carbon::parse($request->pause_start);
        $subscription->pause_end = Carbon::parse($request->pause_end);
        $subscription->status = 'paused'; // kalau ada kolom boolean
        $subscription->save();
        return back()->with('success', 'Subscription successfully paused!');
    }

    public function cancel($id)
    {
        Subscription::findOrFail($id)->update([
            'status' => 'cancelled',
            'ended_at' => now(),
        ]);

        return back()->with('success', 'Subscription successfully cancelled.');
    }

    
}
