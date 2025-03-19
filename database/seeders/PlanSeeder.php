<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plans')->insert([
            [
                'name' => 'Basic Plan',
                'description' => 'Acceso limitado a funcionalidades.',
                'price' => 9.99,
                'state' => 'Activo',
                'duration' => 30,
            ],
            [
                'name' => 'Premium Plan',
                'description' => 'Acceso a más funciones y soporte premium.',
                'price' => 19.99,
                'state' => 'Activo',
                'duration' => 90,
            ],
            [
                'name' => 'Platinum Plan',
                'description' => 'Acceso total y beneficios exclusivos.',
                'price' => 29.99,
                'state' => 'Activo',
                'duration' => 180,
            ],
        ]);
    }
}
