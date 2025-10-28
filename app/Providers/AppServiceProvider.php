<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Task;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Проверка: может ли пользователь просматривать задачу
        Gate::define('view-task', function (User $user, Task $task) {
            return $task->user_id === $user->id || $user->isAdmin();
        });

        // Проверка: может ли пользователь обновлять задачу
        Gate::define('update-task', function (User $user, Task $task) {
            return $task->user_id === $user->id || $user->isAdmin();
        });

        // Проверка: может ли пользователь удалять задачу
        Gate::define('delete-task', function (User $user, Task $task) {
            return $task->user_id === $user->id || $user->isAdmin();
        });
        }
}
