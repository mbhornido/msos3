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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();    
            $table->longText('description')->nullable();    
            $table->string('image')->nullable();    
            $table->string('price')->nullable();    
            $table->string('category')->nullable(); 
            $table->string('global_category')->nullable();   
            $table->string('size')->nullable();    
            $table->string('quantity')->nullable();    
            $table->string('status')->nullable();    
            $table->unsignedBigInteger('user_id')->nullable(); // Add user_id column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
