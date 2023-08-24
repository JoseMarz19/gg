<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'name' => 'Gratis',
            'value' => '0'
        ]);

        Price::create([
            'name' => '3960 MXN$ (nivel 1)',
            'value' => '3960'
        ]);

        Price::create([
            'name' => '5970 MXN$ (nivel 2)',
            'value' => '5790'
        ]);

        Price::create([
            'name' => '12500 MXN$ (nivel 3)',
            'value' => '12500'
        ]);

    }
}
