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
        Schema::create('t_quizzes', function (Blueprint $table) {
            $table->id(); // ID kuis
            $table->string('title'); // Judul kuis
            $table->text('description')->nullable(); // Deskripsi kuis
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status kuis (aktif/tidak aktif)
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_quizzes');
    }
};
