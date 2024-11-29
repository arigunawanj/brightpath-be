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
        Schema::create('t_user_answers', function (Blueprint $table) {
            $table->id(); // ID jawaban
            $table->unsignedBigInteger('user_id'); // ID pengguna yang memberikan jawaban
            $table->unsignedBigInteger('question_id'); // ID soal yang dijawab
            $table->text('answer'); // Jawaban yang diberikan pengguna (ID opsi atau teks jawaban)
            $table->boolean('is_correct')->nullable(); // Status jawaban (benar/salah) untuk MCQ
            $table->timestamps();
            $table->softDeletes();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('m_users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('t_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_user_answers');
    }
};
