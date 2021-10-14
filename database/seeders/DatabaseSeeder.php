<?php

namespace Database\Seeders;

use App\Models\Camaras;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(Arduinoseeder::class);
        $this->call(CamarasSeeder::class);
    }
}
