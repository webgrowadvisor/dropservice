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
        Schema::create('brand_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->string('brand_name');
            $table->string('brand_certificate')->nullable(); // file path
            $table->string('gst_certificate')->nullable(); // file path
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_requests');
    }
};
