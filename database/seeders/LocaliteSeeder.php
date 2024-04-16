<?php

namespace Database\Seeders;

use App\Models\Localite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Localite::create([
            'nomLocalite'=> 'Cotonou',
        ]);
        Localite::create([
            'nomLocalite'=> 'Akpakpa',
        ]);
        Localite::create([
            'nomLocalite'=> 'Kétou',
        ]);
    }
}
