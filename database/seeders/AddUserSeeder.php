<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
        ]);

        $user = User::create([
            "name" => "Athar",
            "email" => "athar@gmail.com",
            "password" => bcrypt("password"),
        ]);

        foreach (range(1, 10) as $i) {
            $userRand = User::create([
                'name' => "User $i",
                'email' => "user$i@example.com",
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);

            // Assign role "user"
            $userRand->assignRole('user');
        }

        $admin->assignRole("admin");
        $user->assignRole("user");
    }
}
