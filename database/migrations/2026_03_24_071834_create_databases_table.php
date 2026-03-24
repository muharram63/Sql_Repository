<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу баз данных, используемых в задачах.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('databases', function (Blueprint $table) {
            $table->id()->comment('PK базы данных');
            $table->string('shop')->comment('Имя/код базы');
            $table->text('description')->comment('Текстовое описание');
            $table->enum('engine',['postgres','sqlite','mysql'])->comment('Движок базы');
            $table->timestamps();
            $table->comment('Список тестовых баз данных и их параметров');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databases');
    }
};
