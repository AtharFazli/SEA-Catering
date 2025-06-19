<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'price_per_meal', 'description'];
    public function subscriptions() {
        return $this->hasMany(Subscription::class);
    }
}
