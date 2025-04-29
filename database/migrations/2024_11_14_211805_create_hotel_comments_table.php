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
        Schema::create('hotel_comments', function (Blueprint $table) {
            $table->id();

            $table->text('comentario');   
            $table->float('calificacion');   
            $table->unsignedBigInteger('user_id');   
            $table->unsignedBigInteger('hotel_id');  
            
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_comments');
    }
};
