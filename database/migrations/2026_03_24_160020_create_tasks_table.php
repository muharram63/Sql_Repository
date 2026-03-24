<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу задач с основными метаданными и связями.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id()->comment('PK задачи');
            $table->foreignId('theme_id')->nullable()->constrained('themes')->nullOnDelete()->comment('Ссылка на тему');
            $table->foreignId('company_id')->nullable()->constrained('companies')->nullOnDelete()->comment('Связанная компания');
            $table->foreignId('database_id')->nullable()->constrained('databases')->nullOnDelete()->comment('База данных для тестов');
            $table->string('title')->comment('Заголовок задания');
            $table->string('slug')->unique()->comment('ЧПУ ссылки');
            $table->longText('description')->comment('Тело задания');
            $table->unsignedTinyInteger('difficulty')->default(1)->comment('Уровень сложности');
            $table->unsignedSmallInteger('points')->default(1)->comment('Баллы за решение');
            $table->boolean('is_premium')->default(false)->comment('Доступно только для премиум');
            $table->boolean('is_published')->default(false)->comment('Опубликовано в каталоге');
            $table->unsignedInteger('time_limit_ms')->nullable()->comment('Лимит времени выполнения');
            $table->unsignedInteger('result_limit')->default(1000)->comment('Ограничение на количество строк');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('Кто добавил задачу');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete()->comment('Последний редактор задачи');
            $table->timestamps();

            $table->index(['difficulty', 'is_published']);
            $table->comment('Описание задач, ограничений и связей с ресурсами');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
