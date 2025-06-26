<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $plans = Plan::all();

        if ($users->isEmpty() || $plans->isEmpty()) {
            $this->command->warn('Please seed users and plans first.');
            return;
        }

        foreach (range(1, 30) as $i) {
            $user = $users->random();
            $plan = $plans->random();

            $status = collect(['active', 'paused', 'cancelled'])->random();

            // Random tanggal created_at antara 3 bulan terakhir
            $createdAt = now()->subDays(rand(1, 90));
            $endedAt = null;
            $pauseStart = null;
            $pauseEnd = null;
            $reactivatedAt = null;

            if ($status === 'cancelled') {
                $endedAt = $createdAt->copy()->addDays(rand(5, 60));
            } elseif ($status === 'paused') {
                $pauseStart = now()->subDays(rand(3, 10));
                $pauseEnd = $pauseStart->copy()->addDays(rand(3, 7));
            } elseif ($status === 'active' && rand(0, 1)) {
                $reactivatedAt = $createdAt->copy()->addDays(rand(10, 60));
            }

            $subscription = Subscription::create([
                'user_id' => $user->id,
                'full_name' => $user->name,
                'phone_number' => '08' . rand(111111111, 999999999),
                'province' => 'DKI Jakarta',
                'city' => 'Jakarta Selatan',
                'district' => 'Kebayoran Lama',
                'sub_district' => 'Pondok Indah',
                'postal_code' => '12345',
                'street_address' => 'Jl. Contoh No.' . rand(1, 100),
                'plan_id' => $plan->id,
                'allergies' => rand(0, 1) ? 'Seafood, Nuts' : null,
                'status' => $status,
                'pause_start' => $pauseStart,
                'pause_end' => $pauseEnd,
                'ended_at' => $endedAt,
                'reactivated_at' => $reactivatedAt,
                'created_at' => $createdAt,
                'updated_at' => now()
            ]);

            $mealTypes = \App\Models\MealType::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $deliveryDays = \App\Models\DeliveryDay::inRandomOrder()->take(rand(2, 5))->pluck('id');

            $subscription->mealTypes()->attach($mealTypes);
            $subscription->deliveryDays()->attach($deliveryDays);
        }
    }
}
