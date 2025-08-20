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

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('variant_id')->nullable()->constrained('product_variants')->onDelete('set null');

            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2); // total price
            $table->string('payment_method')->default('COD'); // 'COD' or 'Online'
            $table->string('status')->default('placed'); // placed, confirmed, shipped, delivered, cancelled
            $table->string('ip_address')->nullable(); // User's IP address
    
            $table->timestamps();
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
