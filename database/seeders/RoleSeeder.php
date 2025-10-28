<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;


class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::insert([
            ['name' => 'participant', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'moderator', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
