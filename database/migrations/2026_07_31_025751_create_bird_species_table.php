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
        Schema::create('bird_species', function (Blueprint $table) {
            $table->id();
            $table->string('local_name');
            $table->string('latin_name')->nullable();
            $table->string('habitat')->nullable();
            $table->string('best_time')->nullable();
            $table->string('conservation_status')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bird_species');
    }
};
