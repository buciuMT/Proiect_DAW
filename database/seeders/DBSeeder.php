<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categorie;
use App\Models\carte;
use App\Models\categorie_model_carte;
use App\Models\stare;
use App\Models\model_carte;

class DBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        stare::create([
            'nume' => 'Noua',
            'descriere' => 'Noua'
        ]);
        stare::create([
            'nume' => 'Utilizata',
            'descriere' => 'Utilizata'
        ]);
        stare::create([
            'nume' => 'Deteriorata',
            'descriere' => 'Deteriorata'
        ]);
        stare::create([
            'nume' => 'Out of commision',
            'descriere' => 'out of commision'
        ]);
        model_carte::create([
            'isbn' => '9781941360392',
            'titlu' => 'The king in yellow',
            'autor' => 'Robert W. Chambers',
            'editura' => 'Eldrich',
            'dark_cover' => 'kinginyellow.png',
            'cover' => 'kinginyellow.png',
            'numar_pagini' => 200,
            'stele' => 4,
        ]);
        categorie::create(
            ['nume_categorie' => 'Horror', 'descriere' => 'Horror']
        );
        categorie_model_carte::create(['nume_categorie' => 'Horror', 'isbn' => '9781941360392']);
    }
}
