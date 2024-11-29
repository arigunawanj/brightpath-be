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
        Schema::create('t_forum_posts', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->foreignId('forum_id')->constrained('t_forums', 'id');
            $table->foreignId('user_id')->constrained('m_users', 'id');
            $table->foreignId('parent_id')->constrained('t_forum_posts', 'id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_forum_posts');
    }
};
