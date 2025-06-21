<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name"      => "required",
            "review"    => "required",
            "rating"    => "required"
        ]);

        Testimonial::create([
            'name'      => $request->name,
            'review'    => $request->review,
            'rating'    => $request->rating
        ]);

        return redirect('/#testimonials_form')->with('success','Testimonial added successfully');
    }
}
