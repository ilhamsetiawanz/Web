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
        Schema::create('artikels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->foreignUuid('idAuthor')->constrained('users')->cascadeOnDelete();
            $table->string('image');
            $table->enum('status', ['Draft', 'Published'])->default('Draft');
            $table->text('content');
            $table->date('Tanggal_Post');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
