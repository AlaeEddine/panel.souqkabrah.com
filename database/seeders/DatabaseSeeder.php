<?php

namespace Database\Seeders;

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
            PaymentGatewaySeeder::class,
            SettingSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            CategorySeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
        ]);
    }
}