<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу тем курсов и материалов.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id()->comment('PK темы');
            $table->string('title')->comment('Название темы');
            $table->text('description')->comment('Описание содержания');
            $table->integer('theme_id')->comment('Внешний идентификатор темы');
            $table->string('slide')->comment('Путь/ссылка на слайд');
            $table->string('video')->comment('Путь/ссылка на видео');
            $table->timestamps();
            $table->comment('Темы уроков с описаниями, слайдами и видео');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
