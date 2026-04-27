<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
       

        Role::create([
            'id' => 1,
            'role_name' => 'Admin',
        ]);

        Role::create([
            'id' => 2,
            'role_name' => 'User',
        ]);
    }
}