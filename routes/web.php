<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserRoleController;

use App\Livewire\AssignRoleComponent;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome',['name'=>' Георгий']);
})->name('welcome');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/tasks', [TaskController::class,'showAll'])->name('tasks.index')->middleware('auth');
    Route::get('/tasks/view/{id}', [TaskController::class,'showOne'])->name('tasks.show');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/tasks/edit/{id}', [TaskController::class,'showEdit'])->name('tasks.edit'); // Форма редактирования;
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Сохранение новой задачи
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Обновление задачи
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::get('/users-with-roles', [UserRoleController::class, 'usersWithRoles'])->name('users.with.roles');
    Route::get('/roles-with-users', [UserRoleController::class, 'rolesWithUsers'])->name('roles.with.users');
    
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/assign-role', AssignRoleComponent::class)->name('assign.role');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
