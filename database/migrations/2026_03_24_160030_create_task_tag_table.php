<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт связку task_tag между задачами и тегами.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_tag', function (Blueprint $table) {
            $table->id()->comment('PK связи');
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnDelete()->comment('Задача');
            $table->foreignId('tag_id')->constrained('task_tags')->cascadeOnDelete()->comment('Тег');
            $table->timestamps();

            $table->unique(['task_id', 'tag_id']);
            $table->comment('Связь задач с тегами для фильтрации');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_tag');
    }
};
