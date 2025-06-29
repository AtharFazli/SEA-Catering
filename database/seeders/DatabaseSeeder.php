<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        AddRoleSeeder::class,
        AddUserSeeder::class,
        MealPlansSeeder::class,
        MealTypesSeeder::class,
        DeliveryDaysSeeder::class,
        TestimonialSeeder::class,
        AddSubscriptionSeeder::class
    ]);
    }
}
