<?php

namespace Database\Seeders;

use App\Models\User;
use App\seeders\DBSeeder;
use Database\Seeders\DBSeeder as SeedersDBSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(
            [admin_user::class, SeedersDBSeeder::class]
        );
        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
    }
}
