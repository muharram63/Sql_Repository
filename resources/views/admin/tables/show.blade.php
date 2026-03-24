@extends('admin.layouts.bootstrap')

@section('title', 'Table')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Таблица #{{ $table->id }}</h1>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-primary" href="{{ route('admin.tables.edit', $table) }}">Редактировать</a>
            <a class="btn btn-outline-secondary" href="{{ route('admin.tables.index') }}">Назад</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Название</dt>
                <dd class="col-sm-9">{{ $table->name }}</dd>

                <dt class="col-sm-3">Описание</dt>
                <dd class="col-sm-9">{{ $table->description }}</dd>
            </dl>
        </div>
    </div>
@endsection
