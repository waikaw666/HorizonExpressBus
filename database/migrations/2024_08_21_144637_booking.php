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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\BusRoute::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('phone_number');
            $table->string('payment_method')->nullable();
            $table->string('payment_information')->nullable();
            $table->string('status')->default("unpaid");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
