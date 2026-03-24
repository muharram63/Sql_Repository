<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу тестов для задач.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnDelete()->comment('Ссылка на задачу, к которой принадлежит тест');
            $table->longText('test_sql')->comment('SQL-код теста для проверки решения');
            $table->json('expected_result_json')->nullable()->comment('Ожидаемый результат в формате JSON (опционально)');
            $table->string('expected_hash')->nullable()->comment('Хэш ожидаемого результата для быстрой проверки');
            $table->string('comparison_strategy')->default('result')->comment('Стратегия сравнения (по результату, по хэшу и т.д.)');
            $table->unsignedSmallInteger('weight')->default(1)->comment('Влияние теста на итоговый балл');
            $table->unsignedSmallInteger('position')->default(0)->comment('Порядок сортировки тестов по задаче');
            $table->timestamps();

            $table->index(['task_id', 'position']);
            $table->comment('Тесты, SQL и стратегии сравнения для задач');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_tests');
    }
};
