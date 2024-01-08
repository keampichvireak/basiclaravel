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
        Schema::create('order_models', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('quantity');
            $table->string('total');
            $table->string('phone');
            $table->string('address');
            $table->unsignedBigInteger('user_order');
            $table->string('cardname');
            $table->string('cardnumber');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('user_order')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_models');
    }
};
