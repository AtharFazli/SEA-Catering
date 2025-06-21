<?php

use App\Http\Controllers\DashboardController;
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

Route::get('mealplans', [MealPlanController::class, 'index'])->name('mealplans.index');

Route::get('/subscriptions', function () {
    return view('user.subs');
})->name('subscriptions');
Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['auth'])->prefix('dash')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/subscriptions/pause/{id}', [SubscriptionController::class, 'pause'])->name('subscriptions.pause');
    Route::post('/subscriptions/pause', [SubscriptionController::class, 'submitPause'])->name('subscriptions.pause.submit');
    Route::delete('/subscriptions/cancel/{id}', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
});


require __DIR__ . '/auth.php';
