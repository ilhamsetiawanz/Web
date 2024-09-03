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
        Schema::create('data_penyakits', function (Blueprint $table) {
            $table->id();
            $table->string('KdPenyakit')->nullable();
            $table->string('NamaPenyakit');
            $table->text('reason');
            $table->text('solution')->nullable();
            $table->string('image', '255')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penyakits');
    }
};
