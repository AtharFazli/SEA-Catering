<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::insert([
            ['name' => 'Saul Goodman', 'review' => "I've tried many meal delivery services, but SEA Catering is on another level. The meals are fresh, tasty, and perfectly portioned. I’ve lost 4kg in a month without feeling restricted!", 'rating' => '5'],
            ['name' => 'Sara Wilsson', 'review' => 'I love how SEA Catering allows me to customize my meals. As a vegetarian, it’s hard to find healthy and balanced options—but this service gets it just right!', 'rating' => '4'],
            ['name' => 'Jena Karlis', 'review' => 'I subscribed to the Protein Plan and it’s been amazing. Meals arrive on time, are super filling, and help me hit my nutrition goals. Plus, I don’t waste time cooking anymore!', 'rating' => '3'],
        ]);
    }
}
