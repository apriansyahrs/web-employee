<?php

namespace Database\Seeders;

use App\Models\JobPosition;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BusinessEnitySeeder::class,
            DivisionSeeder::class,
            JobLevelSeeder::class,
            JobPositionSeeder::class,
            UserSeeder::class,
        ]);
    }
}
