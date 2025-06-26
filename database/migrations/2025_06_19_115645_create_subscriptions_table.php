<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->string('sub_district');
            $table->string('postal_code');
            $table->string('street_address');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            $table->text('allergies')->nullable();
            $table->enum('status', ['active', 'paused', 'cancelled'])->default('active');
            $table->date('pause_start')->nullable();
            $table->date('pause_end')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->timestamp('reactivated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
