<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу эталонных решений задач.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_solutions', function (Blueprint $table) {
            $table->id()->comment('PK решения');
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnDelete()->comment('Задача, к которой относится');
            $table->longText('sql_text')->comment('SQL-решение');
            $table->longText('explanation')->nullable()->comment('Пояснение к решению');
            $table->boolean('is_reference')->default(false)->comment('Эталонное решение');
            $table->boolean('is_premium')->default(false)->comment('Только премиум-контент');
            $table->timestamps();
            $table->comment('Эталонные решения и пояснения для задач');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_solutions');
    }
};
