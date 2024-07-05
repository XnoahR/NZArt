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
            $table->foreignId('user_id')->constrained()
                ->onDelete('cascade');
            $table->foreignId('product_id')->constrained()
                ->onDelete('cascade');
            $table->enum('material', ['HVS', 'Art Paper', 'Ivory', 'Linen', 'Manila'])
                ->default('HVS')
                ->nullable();
            $table->enum('size', ['A3', 'A4', 'A5', 'B4', 'B5'])
                ->default('A4')
                ->nullable();
            $table->string('file');
            $table->integer('quantity')
                ->default(1);
            $table->integer('price');
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])
                ->default('pending');
            // $table->timestamps();
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


