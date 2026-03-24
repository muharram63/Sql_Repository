@extends('admin.layouts.bootstrap')

@section('title', 'Create Table')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Создать таблицу</h1>
        <a class="btn btn-outline-secondary" href="{{ route('admin.tables.index') }}">Назад</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tables.store') }}" method="post">
                @csrf
                @include('admin.tables._form', ['table' => new \App\Models\DatabaseTable()])
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
