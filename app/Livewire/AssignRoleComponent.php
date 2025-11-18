<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class AssignRoleComponent extends Component
{
    protected $layout = 'layouts.app';
    public $user_id;
    public $role_id;

    // Списки для выпадающих списков
    public $users;
    public $roles;

    public function mount()
    {
        $this->users = User::all();
        $this->roles = Role::all();
    }

    public function assignRole()
    {

        $this->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($this->user_id);
        $role = Role::find($this->role_id);

        // Проверим, что связь ещё не существует
        if (!$user->roles()->where('role_id', $role->id)->exists()) {
            $user->roles()->attach($role);

            session()->flash('message', "Роль '{$role->name}' успешно назначена пользователю '{$user->name}'.");

            $this->reset(['user_id', 'role_id']);
        } else {
            session()->flash('error', "У пользователя '{$user->name}' уже есть роль '{$role->name}'.");
        }
    }

    public function render()
    {
        return view('livewire.assign-role-component') ->layout('layouts.app');
    }
}