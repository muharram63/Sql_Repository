<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаёт таблицы очередей задач, батчей и ошибок.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id()->comment('PK фоновой задачи');
            $table->string('queue')->index()->comment('Имя очереди');
            $table->longText('payload')->comment('Сериализованные данные для обработки');
            $table->unsignedTinyInteger('attempts')->comment('Число попыток выполнения');
            $table->unsignedInteger('reserved_at')->nullable()->comment('Когда задачу зарезервировали');
            $table->unsignedInteger('available_at')->comment('Когда задача снова доступна');
            $table->unsignedInteger('created_at')->comment('Когда задача была поставлена');
            $table->comment('Очередь фоновых задач и состояние обработки');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary()->comment('PK батча');
            $table->string('name')->comment('Читаемое имя батча');
            $table->integer('total_jobs')->comment('Всего задач в батче');
            $table->integer('pending_jobs')->comment('Сколько задач осталось');
            $table->integer('failed_jobs')->comment('Сколько задач завершились с ошибкой');
            $table->longText('failed_job_ids')->comment('Список проваленных задач');
            $table->mediumText('options')->nullable()->comment('Дополнительные параметры батча');
            $table->integer('cancelled_at')->nullable()->comment('Время отмены');
            $table->integer('created_at')->comment('Когда батч создан');
            $table->integer('finished_at')->nullable()->comment('Когда батч завершён');
            $table->comment('Группы задач, объединённые в батчи');
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id()->comment('PK неудачной задачи');
            $table->string('uuid')->unique()->comment('Уникальный UUID попытки');
            $table->text('connection')->comment('Соединение, на котором запускали');
            $table->text('queue')->comment('Очередь, в которой была задача');
            $table->longText('payload')->comment('Данные задачи');
            $table->longText('exception')->comment('Стэк ошибки');
            $table->timestamp('failed_at')->useCurrent()->comment('Когда задача упала');
            $table->comment('История неудачных выполнения очередей');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
