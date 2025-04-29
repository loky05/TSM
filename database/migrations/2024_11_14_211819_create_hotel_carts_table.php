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
        Schema::create('hotel_carts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('num_noches');
            $table->date('checkin');
            $table->date('checkout');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hotel_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_carts');
    }
};
