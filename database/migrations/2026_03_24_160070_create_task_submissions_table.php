<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу отправок решений задач.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_submissions', function (Blueprint $table) {
            $table->id()->comment('PK отправки');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->comment('Пользователь');
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnDelete()->comment('Задача');
            $table->longText('sql_text')->comment('SQL-решение пользователя');
            $table->string('status')->default('queued')->comment('Статус обработки');
            $table->boolean('is_correct')->default(false)->comment('Результат проверки');
            $table->longText('error_text')->nullable()->comment('Текст ошибки');
            $table->unsignedInteger('runtime_ms')->nullable()->comment('Время выполнения');
            $table->unsignedInteger('row_count')->nullable()->comment('Количество строк');
            $table->string('result_hash')->nullable()->comment('Хэш результата');
            $table->timestamps();

            $table->index(['user_id', 'task_id', 'status']);
            $table->comment('Отправленные пользователями SQL-запросы и результаты');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_submissions');
    }
};
