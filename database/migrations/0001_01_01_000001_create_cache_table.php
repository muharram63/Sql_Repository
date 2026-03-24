<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицы кэша и локов для синхронизации.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary()->comment('Уникальный ключ кэша');
            $table->mediumText('value')->comment('Сохранённые данные');
            $table->integer('expiration')->index()->comment('Момент истечения TTL');
            $table->comment('Кэшированные значения с меткой времени истечения');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary()->comment('Ключ блокировки');
            $table->string('owner')->comment('Идентификатор владельца блокировки');
            $table->integer('expiration')->index()->comment('Время снятия блокировки');
            $table->comment('Замки для предотвращения гонок при записи кэша');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
