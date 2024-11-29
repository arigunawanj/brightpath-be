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
        Schema::create('t_quiz_questions', function (Blueprint $table) {
            $table->id(); // ID hubungan kuis dan soal
            $table->unsignedBigInteger('quiz_id'); // ID kuis
            $table->unsignedBigInteger('question_id'); // ID soal
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('quiz_id')->references('id')->on('t_quizzes')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('t_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_quiz_questions');
    }
};
