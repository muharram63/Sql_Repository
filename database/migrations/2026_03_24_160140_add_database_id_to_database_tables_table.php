<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция добавляет связь database_tables → databases.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('database_tables', function (Blueprint $table) {
            $table->foreignId('database_id')->nullable()->after('id')->constrained('databases')->nullOnDelete()->comment('Ссылка на базу данных');
            $table->index(['database_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::table('database_tables', function (Blueprint $table) {
            $table->dropIndex(['database_id', 'name']);
            $table->dropConstrainedForeignId('database_id');
        });
    }
};
