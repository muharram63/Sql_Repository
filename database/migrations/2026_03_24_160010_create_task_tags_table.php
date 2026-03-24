<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу тегов задач.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_tags', function (Blueprint $table) {
            $table->id()->comment('PK тега');
            $table->string('name')->comment('Название тега');
            $table->string('slug')->unique()->comment('Идентификатор для URL');
            $table->timestamps();
            $table->comment('Словарь тегов для задач и их идентификаторы');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_tags');
    }
};
