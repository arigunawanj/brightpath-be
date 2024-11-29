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
        Schema::create('t_questions', function (Blueprint $table) {
            $table->id(); // ID soal
            $table->unsignedBigInteger('quiz_id'); // ID kuis
            $table->text('question_text'); // Teks soal
            $table->enum('type', ['mcq', 'true_false', 'essay']); // Jenis soal
            $table->float('max_score'); // Skor maksimum untuk soal
            $table->softDeletes();
            $table->timestamps();

            // Foreign key
            $table->foreign('quiz_id')->references('id')->on('t_quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_questions');
    }
};
