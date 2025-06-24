<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\MealType;
use App\Models\DeliveryDay;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('user.subs');
    }

    public function store(Request $request)
    {
        $validated = $this->validateSubscription($request);

        $subscription = $this->createSubscription($validated);
        $this->attachMealTypes($subscription, $validated['meal_types']);
        $this->attachDeliveryDays($subscription, $validated['delivery_days']);

        return redirect()
            ->route('subscriptions')
            ->with('success', 'Subscription created successfully!');
    }

    public function submitPause(Request $request)
    {
        $validated = $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'pause_start' => 'required|date|after_or_equal:today',
            'pause_end' => 'required|date|after_or_equal:pause_start',
        ]);

        $subscription = Subscription::findOrFail($validated['subscription_id']);

        $subscription->update([
            'pause_start' => Carbon::parse($validated['pause_start']),
            'pause_end' => Carbon::parse($validated['pause_end']),
            'status' => 'paused',
        ]);

        return back()->with('success', 'Subscription successfully paused!');
    }

    public function cancel(Subscription $subscription)
    {
        $subscription->update([
            'status' => 'cancelled',
            'ended_at' => now(),
        ]);

        return back()->with('success', 'Subscription successfully cancelled.');
    }

    // ===== Helper Methods =====

    private function validateSubscription(Request $request): array
    {
        return $request->validate([
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
    }

    private function createSubscription(array $data): Subscription
    {
        return Subscription::create([
            'user_id'        => Auth::id(),
            'plan_id'        => $this->getPlanId($data['plan']),
            'phone_number'   => $data['phone_number'],
            'province'       => $data['province'],
            'city'           => $data['city'],
            'district'       => $data['district'],
            'sub_district'   => $data['sub_district'],
            'postal_code'    => $data['postal_code'],
            'street_address' => $data['street_address'],
            'allergies'      => $data['allergies'] ?? null,
        ]);
    }

    private function attachMealTypes(Subscription $subscription, array $mealTypes): void
    {
        $mealTypeIds = MealType::whereIn('name', $mealTypes)->pluck('id');
        $subscription->mealTypes()->attach($mealTypeIds);
    }

    private function attachDeliveryDays(Subscription $subscription, array $deliveryDays): void
    {
        $dayIds = DeliveryDay::whereIn('name', $deliveryDays)->pluck('id');
        $subscription->deliveryDays()->attach($dayIds);
    }

    private function getPlanId(string $planSlug): ?int
    {
        return match ($planSlug) {
            'diet'    => 1,
            'protein' => 2,
            'royal'   => 3,
            default   => null,
        };
    }
}
