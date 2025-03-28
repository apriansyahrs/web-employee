<?php

namespace Database\Seeders;

use App\Models\BusinessEntity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessEnitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessEntity::insert([
            [
                'name' => 'Toko Mas An An'
            ],
            [
                'name' => 'CV Top Selular'
            ],
            [
                'name' => 'PT Media Selular Indonesia'
            ],
            [
                'name' => 'CV Complete Selular'
            ]
        ]);
    }
}
