<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome',['name'=>' Георгий']);
})->name('welcome');

Route::get('/tasks', [TaskController::class,'showAll'])->name('tasks.index');
Route::get('/tasks/view/{id}', [TaskController::class,'showOne'])->name('tasks.show');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/edit/{id}', [TaskController::class,'showEdit'])->name('tasks.edit'); // Форма редактирования;
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Сохранение новой задачи
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Обновление задачи
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');