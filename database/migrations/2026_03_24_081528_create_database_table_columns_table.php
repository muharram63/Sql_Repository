<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу метаданных столбцов баз данных.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('database_table_columns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained('database_tables')->comment('Ссылка на описание таблицы');
            $table->text('type')->default('string')->comment('Тип поля в тестовой таблице');
            $table->string('name')->comment('Имя столбца в базе данных');
            $table->text('description')->comment('Пояснение назначения столбца');
            $table->boolean('nullable')->default(false)->comment('Можно ли записывать NULL');
            $table->string('default')->default('string')->comment('Значение по умолчанию');
            $table->timestamps();
            $table->comment('Схемы столбцов таблиц тестовых баз данных');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_table_columns');
    }
};
