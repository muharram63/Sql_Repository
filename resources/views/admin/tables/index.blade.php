@extends('admin.layouts.bootstrap')

@section('title', 'Tables')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Таблицы</h1>
        <a class="btn btn-primary" href="{{ route('admin.tables.create') }}">Создать таблицу</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                    <tr>
                        <th style="width: 80px">#</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th style="width: 220px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($tables as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>{{ $table->name }}</td>
                            <td>{{ $table->description }}</td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.tables.show', $table) }}">Открыть</a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.tables.edit', $table) }}">Редактировать</a>
                                <form action="{{ route('admin.tables.destroy', $table) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Удалить таблицу?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">Пока нет таблиц</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $tables->links() }}
        </div>
    </div>
@endsection
