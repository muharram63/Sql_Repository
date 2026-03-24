<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу метаданных таблиц баз данных.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('database_tables', function (Blueprint $table) {
            $table->id()->comment('PK описания таблицы');
            $table->string('name')->comment('Имя тестовой таблицы');
            $table->text('description')->comment('Описание назначение');
            $table->timestamps();
            $table->comment('Описание таблиц в тестовых базах данных');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_tables');
    }
};
