<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Dimension;
use App\Models\Largeur;
use App\Models\Longueur;
use App\Models\Matelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Matelas::factory(10)->create();
        Brand::factory()->create(['name' => 'Epeda']);
        Brand::factory()->create(['name' => 'Dreamway']);
        Brand::factory()->create(['name' => 'Bultex']);
        Brand::factory()->create(['name' => 'Dorsoline']);
        Brand::factory()->create(['name' => 'Memoryline']);

        $longueurs = [180, 190, 200, 210, 220];
        $largeurs = [80, 90, 100, 120, 140, 160, 180, 200];
        foreach ($longueurs as $longueur){
            Longueur::factory()->create(['value' => $longueur]);
        }
        foreach ($largeurs as $largeur){
            Largeur::factory()->create(['value' => $largeur]);
        }

    }
}
