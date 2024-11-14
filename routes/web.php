<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::get('/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('/', [TodoController::class, 'store'])->name('todos.store');
Route::get('/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
