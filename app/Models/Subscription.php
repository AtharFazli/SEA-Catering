<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id', 'phone_number', 'plan_id', 'allergies'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function plan() {
        return $this->belongsTo(Plan::class);
    }

    public function mealTypes() {
        return $this->belongsToMany(MealType::class, 'subscription_meal_type');
    }

    public function deliveryDays() {
        return $this->belongsToMany(DeliveryDay::class, 'subscription_delivery_day');
    }
}
