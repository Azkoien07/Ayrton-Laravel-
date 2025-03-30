<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@ayrton.com',
            'password' => Hash::make('admin123'),
            'username' => 'admin',
            'role_id' => 1,
            'plan_id' => 2,
        ]);
    }
}
