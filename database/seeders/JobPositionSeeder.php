<?php

namespace Database\Seeders;

use App\Models\JobPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobPosition::insert([
            [
                'name' => 'INTERNAL AUDITOR',
            ],
            [
                'name' => 'FINANCE ACCOUNTANT',
            ],
            [
                'name' => 'IT SUPPORT',
            ],
            [
                'name' => 'RETAIL STORE MANAGER',
            ]
        ]);
    }
}
