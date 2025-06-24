<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        return view('landing', compact('testimonials'));
    }
}
