<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [UserController::class, 'index']);
Route::post('users/list', [UserController::class, 'getUsers'])->name('users.list');

Route::get('/export-excel', [UserController::class, 'ExportExcel']);
// web.php
// Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::post('users/{id}', [UserController::class, 'update'])->name('users.update');
// routes/web.php
// use App\Http\Controllers\ExcelExportController;

// Route::get('export/users', [ExcelExportController::class, 'export'])->name('export.users');
