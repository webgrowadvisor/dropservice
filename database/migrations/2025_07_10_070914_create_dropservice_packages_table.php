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
        Schema::create('dropservice_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dropservice_id')->constrained()->onDelete('cascade');
            $table->string('package_name');
            $table->decimal('price', 10, 2);
            $table->json('features')->nullable();
            $table->timestamp('purchased_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dropservice_packages');
    }
};
