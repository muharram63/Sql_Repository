@extends('admin.layouts.bootstrap')

@section('title', 'Edit Table')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Редактировать таблицу</h1>
        <a class="btn btn-outline-secondary" href="{{ route('admin.tables.index') }}">Назад</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tables.update', $table) }}" method="post">
                @csrf
                @method('PUT')
                @include('admin.tables._form', ['table' => $table])
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
