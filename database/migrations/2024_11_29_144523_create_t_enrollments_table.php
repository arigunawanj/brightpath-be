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
        Schema::create('t_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('m_users', 'id');
            $table->foreignId('course_id')->constrained('m_courses', 'id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_enrollments');
    }
};
