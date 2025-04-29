<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\AirlineSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'rol'=>1,
        ]);
        
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            ServiceSeeder::class,
            AirlineSeeder::class,
        ]);

    }
}
