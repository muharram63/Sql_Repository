<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицы пользователей, сброса пароля и сессий.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('PK пользователя');
            $table->foreignId('role_id')->constrained('roles')->comment('Роль пользователя на платформе');
            $table->string('name')->comment('Имя или ник пользователя');
            $table->string('email')->unique()->comment('Уникальный адрес электронной почты');
            $table->string('avatar')->nullable()->comment('Путь к аватару');
            $table->timestamp('email_verified_at')->nullable()->comment('Когда email был подтверждён');
            $table->string('password')->comment('Хэш пароля');
            $table->string('password_confirmation')->nullable()->comment('Поле для вспомогательных задач');
            $table->string('provider')->nullable()->comment('OAuth-провайдер, если есть');
            $table->string('provider_id')->nullable()->comment('ID пользователя у провайдера');
            $table->rememberToken()->comment('Токен для «запомнить меня»');
            $table->timestamps();
            $table->comment('Учётные записи пользователей и базовые метаданные');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary()->comment('Email для сброса пароля');
            $table->string('token')->comment('Токен с ограниченным сроком');
            $table->timestamp('created_at')->nullable()->comment('Когда был создан токен');
            $table->comment('Токены и метки сброса пароля');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary()->comment('PK сессии');
            $table->foreignId('user_id')->nullable()->index()->comment('Пользователь, создавший сессию');
            $table->string('ip_address', 45)->nullable()->comment('IP адрес пользователя');
            $table->text('user_agent')->nullable()->comment('Agent браузера');
            $table->longText('payload')->comment('Сериализованные данные сессии');
            $table->integer('last_activity')->index()->comment('Время последней активности');
            $table->comment('Активные сессии пользователей и их контекст');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
