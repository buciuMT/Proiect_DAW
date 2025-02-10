<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class admin_user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'nume' => 'Admin',
            'prenume' => 'The',
            'email' => 'admin@asd.asd',
            'password' => Hash::make('parola'),
            'angajat' => true,
        ]);
    }
}
