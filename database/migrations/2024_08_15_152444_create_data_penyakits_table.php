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
            $table->string('KdPenyakit');
            $table->string('NamaPenyakit');
            $table->string('Solusi');
            $table->string('Pencegahan');
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
