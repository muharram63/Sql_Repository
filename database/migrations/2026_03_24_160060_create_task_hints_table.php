<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу подсказок для задач.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_hints', function (Blueprint $table) {
            $table->id()->comment('PK подсказки');
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnDelete()->comment('Задача');
            $table->text('body')->comment('Текст подсказки');
            $table->unsignedSmallInteger('position')->default(0)->comment('Позиция подсказки');
            $table->boolean('is_premium')->default(false)->comment('Только для премиум');
            $table->timestamps();
            $table->comment('Подсказки и пояснения, привязанные к задачам');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_hints');
    }
};
