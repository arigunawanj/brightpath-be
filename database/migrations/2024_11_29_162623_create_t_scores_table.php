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
        Schema::create('t_scores', function (Blueprint $table) {
            $table->id(); // ID skor
            $table->unsignedBigInteger('user_id'); // ID pengguna
            $table->unsignedBigInteger('quiz_id'); // ID kuis yang diikuti
            $table->float('total_score'); // Skor total yang diperoleh
            $table->timestamps();
            $table->softDeletes();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('m_users')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('t_quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_scores');
    }
};
