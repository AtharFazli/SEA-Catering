<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::insert([
            [
                'name' => 'Diet Plan',
                'description' => 'Ideal for calorie-conscious individuals. Enjoy balanced meals designed to support weight management and a healthy lifestyle.',
                'price_per_meal' => 30000
            ],
            [
                'name' => 'Protein Plan',
                'description' => 'Perfect for active lifestyles and fitness enthusiasts. Packed with lean proteins and nutrients to fuel your day.',
                'price_per_meal' => 40000
            ],
            [
                'name' => 'Royal Plan',
                'description' => 'Get the full experience with access to premium dishes, exclusive add-ons, and priority support for a luxurious meal journey.',
                'price_per_meal' => 60000
            ],
        ]);
    }
}
