<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицу сертификатов пользователей.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id()->comment('PK сертификата');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->comment('Владелец сертификата');
            $table->string('code')->unique()->comment('Уникальный код сертификата');
            $table->string('status')->default('issued')->comment('Статус сертификата');
            $table->timestamp('issued_at')->useCurrent()->comment('Когда выдан');
            $table->timestamp('revoked_at')->nullable()->comment('Когда аннулирован');
            $table->json('meta')->nullable()->comment('Дополнительные данные');
            $table->timestamps();
            $table->comment('Сертификаты, коды и статусы их выдачи');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
