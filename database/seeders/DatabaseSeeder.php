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

        Matelas::factory()->create([
            'name' => 'Matelas Confort+',
            'price' => 759,
            'discount' => 25,
            'discounted_price' => Matelas::discount(759, 25),
            'brand_id' => 1,
            'longueur_id' => 2,
            'largeur_id' => 2,
        ]);

        
        Matelas::factory()->create([
            'name' => 'Matelas Assurance',
            'price' => 809,
            'discount' => 15,
            'discounted_price' => Matelas::discount(809, 15),
            'brand_id' => 2,
            'longueur_id' => 2,
            'largeur_id' => 2,
        ]);


        Matelas::factory()->create([
            'name' => 'Matelas Essentiel',
            'price' => 759,
            'discount' => 25,
            'discounted_price' => Matelas::discount(759, 25),
            'brand_id' => 3,
            'longueur_id' => 2,
            'largeur_id' => 5,
        ]);


        Matelas::factory()->create([
            'name' => 'Matelas Prestige',
            'price' => 1019,
            'discount' => null,
            'discounted_price' => Matelas::discount(1019, null),
            'brand_id' => 1,
            'longueur_id' => 3,
            'largeur_id' => 6,
        ]);

        Matelas::factory(10)->create();
    }
}
