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
        Schema::create('t_question_options', function (Blueprint $table) {
            $table->id(); // ID pilihan jawaban
            $table->unsignedBigInteger('question_id'); // ID soal
            $table->text('option_text'); // Teks pilihan jawaban
            $table->boolean('is_correct'); // Apakah pilihan ini benar
            $table->timestamps();
            $table->softDeletes();

            // Foreign key
            $table->foreign('question_id')->references('id')->on('t_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_question_options');
    }
};
