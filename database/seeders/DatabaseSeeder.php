<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call(RoleSeeder::class); // 🔥 penting

    User::factory()->create([
        'name' => 'Test Admin',
        'email' => 'nsa@example.com',
        'role_id' => 1,
        'password' => bcrypt('12345678'),
    ]);

    User::factory()->create([
        'name' => 'Test User',
        'email' => 'user@example.com',
        'role_id' => 2,
        'password' => bcrypt('123456789'),
    ]);
}
}