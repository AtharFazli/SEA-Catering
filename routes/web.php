<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\ReactivateController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SubscriptionController;
use Mockery\Matcher\Subset;

// landing routes
Route::get("/", [LandingController::class, 'index'])->name("home");
Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');

// contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// mealplan routes
Route::get('mealplans', [MealPlanController::class, 'index'])->name('mealplans.index');

// subscription routes
Route::middleware('auth')->group(function () {
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
});

// dashboard routes
Route::middleware(['auth'])->prefix('dash')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/subs-table', [DashboardController::class, 'subsTable'])->name('dashboard.table');
        Route::get('/reactivate', [ReactivateController::class, 'index'])->name('reactivate.index');
        Route::patch('/reactivate/{id}/reactivated', [ReactivateController::class, 'reactivate'])->name('reactivate.reactivated');
        Route::get('/export-csv', [DashboardController::class, 'exportCsv'])->name('admin.export.csv');
    });

    // user routes
    Route::post('/subscriptions/pause', [SubscriptionController::class, 'submitPause'])->name('subscriptions.pause.submit');
    Route::delete('/subscriptions/cancel/{id}', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
});







// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
