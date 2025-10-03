<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@teste.com'],
            ['name' => 'Admin',
             'password' => bcrypt('12345678'),]);
    }
}
