<?php

namespace Database\Seeders;

use App\Models\Categoriex;
use App\Models\Magazin;
use App\Models\Optuser;
use App\Models\Producator;
use App\Models\Produs;
use App\Models\Stoc;
use Illuminate\Database\Seeder;




class AllTablesSeeder extends Seeder
{
    public function run()
    {
        // Seed Categorie Table
        // Seed Magazin Table
        $magazin1 = Magazin::create(['DENUMIRE' => 'TechStore', 'ORAS' => 'Bucharest']);
        $magazin2 = Magazin::create(['DENUMIRE' => 'FashionShop', 'ORAS' => 'Cluj']);

        $categorie1 = Categoriex::create(['DENUMIRE' => 'Electronics']);
        $categorie2 = Categoriex::create(['DENUMIRE' => 'Clothing']);
        // Seed Producator Table
        $producator1 = Producator::create(['NUME' => 'Samsung', 'SERVICE' => 'Warranty']);
        $producator2 = Producator::create(['NUME' => 'Nike', 'SERVICE' => 'Return']);

        // Seed Produs Table
        $produs1 = Produs::create([
            'DENUMIRE' => 'Samsung Galaxy S21',
            'COD_CATEGORIE' => $categorie1->ID_CATEGORIE,
            'COD_PRODUCATOR' => $producator1->ID_PRODUCATOR,
            'USER_RATING' => 4.5
        ]);

        $produs2 = Produs::create([
            'DENUMIRE' => 'Nike Air Max',
            'COD_CATEGORIE' => $categorie2->ID_CATEGORIE,
            'COD_PRODUCATOR' => $producator2->ID_PRODUCATOR,
            'USER_RATING' => 4.0
        ]);

        // Seed Stoc Table
        Stoc::create([
            'COD_PRODUS' => $produs1->ID_PRODUS,
            'COD_MAGAZIN' => $magazin1->ID_MAGAZIN,
            'PRET' => 999.99,
            'CANTITATE' => 50
        ]);

        Stoc::create([
            'COD_PRODUS' => $produs2->ID_PRODUS,
            'COD_MAGAZIN' => $magazin2->ID_MAGAZIN,
            'PRET' => 120.00,
            'CANTITATE' => 100
        ]);

        Optuser::create([
            'email' => 'theodor.buciu@proton.me'
        ]);
    }
}
