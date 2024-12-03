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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('size');
            $table->integer('quantity');
            $table->decimal('total_fee', 8, 2);
            $table->decimal('price', 8, 2);
            $table->string('status')->default('Pending');
            $table->string('track')->default('Order is placed');
            $table->string('name')->nullable();
            $table->string('rec_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders'); 
    }
};
