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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('KdGejala')->constrained('data_gejalas')->cascadeOnDelete();
            $table->foreignId('KdPenyakit')->constrained('data_penyakits')->cascadeOnDelete();
            $table->foreignId('next_first_gejala_id')->nullable()->constrained('data_gejalas')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
