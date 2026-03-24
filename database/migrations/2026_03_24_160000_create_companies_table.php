<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу компаний и их описаний.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id()->comment('PK компании');
            $table->string('name')->unique()->comment('Название компании');
            $table->string('slug')->unique()->comment('Короткий идентификатор');
            $table->text('description')->nullable()->comment('Описание компании');
            $table->string('logo_path')->nullable()->comment('Путь к логотипу');
            $table->boolean('is_active')->default(true)->comment('Активна ли компания');
            $table->timestamps();
            $table->comment('Партнёры и компании с описаниями и логотипами');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
