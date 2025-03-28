<?php

namespace Database\Seeders;

use App\Models\JobLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobLevel::insert([
            [
                'name' => 'STAFF'
            ],
            [
                'name' => 'TEAM LEADER'
            ],
            [
                'name' => 'COORDINATOR'
            ],
            [
                'name' => 'MANAGER'
            ]
        ]);
    }
}
