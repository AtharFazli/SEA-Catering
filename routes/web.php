<?php

use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    $testimonials = Testimonial::orderBy('id', 'asc')->get();
    return view('landing', compact('testimonials'));
})->name('home');

Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');

Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

Route::get('mealplans', [MealPlanController::class,'index'])->name('mealplans.index');

Route::get('/subscriptions', function () {
    return view('user.subs');
})->name('subscriptions');
Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
