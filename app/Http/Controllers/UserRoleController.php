<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

class UserRoleController extends Controller
{
    
    public function usersWithRoles()
    {
        // Загружаем пользователей с их ролями
        $users = User::with('roles')->get();

        return view('users-with-roles', ['users' => $users]);
    }


    public function rolesWithUsers()
    {
        // Загружаем роли с их пользователями
        $roles = Role::with('users')->get();

        return view('roles-with-users', ['roles' => $roles]);
    }
}