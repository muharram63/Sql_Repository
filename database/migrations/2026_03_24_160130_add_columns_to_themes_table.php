<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция добавляет дополнительные поля и индекс в themes.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title')->comment('ЧПУ темы');
            $table->unsignedInteger('position')->default(0)->after('description')->comment('Сортировка');
            $table->boolean('is_published')->default(true)->after('position')->comment('Публикация темы');
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropColumn(['slug', 'position', 'is_published']);
        });
    }
};
