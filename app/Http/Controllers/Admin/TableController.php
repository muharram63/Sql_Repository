<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatabaseTable;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = DatabaseTable::query()->orderByDesc('id')->paginate(10);

        return view('admin.tables.index', compact('tables'));
    }

    public function create()
    {
        return view('admin.tables.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        DatabaseTable::create($data);

        return redirect()->route('admin.tables.index')
            ->with('success', 'Таблица создана.');
    }

    public function show(DatabaseTable $table)
    {
        return view('admin.tables.show', compact('table'));
    }

    public function edit(DatabaseTable $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    public function update(Request $request, DatabaseTable $table)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $table->update($data);

        return redirect()->route('admin.tables.index')
            ->with('success', 'Таблица обновлена.');
    }

    public function destroy(DatabaseTable $table)
    {
        $table->delete();

        return redirect()->route('admin.tables.index')
            ->with('success', 'Таблица удалена.');
    }
}
