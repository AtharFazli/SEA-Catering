<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index(){
        $plans = Plan::all();
        return view("user.menu",compact("plans"));
    }
}
