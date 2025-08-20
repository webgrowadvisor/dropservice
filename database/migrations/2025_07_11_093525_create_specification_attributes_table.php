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
        Schema::create('specification_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')
                  ->constrained('specification_groups')
                  ->onDelete('cascade');
            $table->string('name');
            $table->string('field_type')->default('text'); // text, select, textarea
            $table->string('default_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specification_attributes');
    }
};
