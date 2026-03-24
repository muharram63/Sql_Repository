<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу прогресса пользователей по задачам.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_task_progress', function (Blueprint $table) {
            $table->id()->comment('PK прогресса');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->comment('Пользователь');
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnDelete()->comment('Задача');
            $table->timestamp('solved_at')->nullable()->comment('Когда задачa решена');
            $table->unsignedInteger('attempts_count')->default(0)->comment('Сколько попыток');
            $table->foreignId('best_submission_id')->nullable()->constrained('task_submissions')->nullOnDelete()->comment('Лучшее решение');
            $table->foreignId('last_submission_id')->nullable()->constrained('task_submissions')->nullOnDelete()->comment('Последнее решение');
            $table->timestamps();

            $table->unique(['user_id', 'task_id']);
            $table->comment('Прогресс пользователя по задачам (лучшие и последние попытки)');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_task_progress');
    }
};
