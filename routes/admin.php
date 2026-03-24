<?php

use App\Http\Controllers\Admin\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');



Route::resource('tables', TableController::class);
