<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу строк тестовых таблиц баз данных.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('database_table_rows', function (Blueprint $table) {
            $table->id()->comment('PK строки');
            $table->foreignId('table_id')->constrained('database_tables')->cascadeOnDelete()->comment('Таблица');
            $table->json('row_json')->comment('Содержимое строки');
            $table->unsignedInteger('position')->default(0)->comment('Порядок строки');
            $table->timestamps();

            $table->index(['table_id', 'position']);
            $table->comment('Содержимое строк таблиц тестовых баз данных');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('database_table_rows');
    }
};
