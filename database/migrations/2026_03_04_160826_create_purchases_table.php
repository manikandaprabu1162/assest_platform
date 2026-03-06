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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            $table->foreignId('asset_id')->constrained()->cascadeOnDelete();
            
            $table->decimal('price', 10, 2);
            $table->string('transaction_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('payment_status')->default('pending');
            
            $table->string('currency')->default('INR');
            $table->json('payment_response')->nullable();
            $table->timestamp('purchased_at')->nullable();

            $table->timestamps();
            
            $table->index(['user_id', 'payment_status']);
            $table->index(['asset_id', 'payment_status']);
            $table->index('transaction_id');
            $table->index('order_id');
            
            $table->unique(['user_id', 'asset_id', 'payment_status'], 'unique_completed_purchase')
                  ->where('payment_status', 'completed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};