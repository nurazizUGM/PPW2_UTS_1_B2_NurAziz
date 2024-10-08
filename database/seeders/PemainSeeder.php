<?php

namespace Database\Seeders;

use App\Models\Pemain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posisi = Pemain::$enumPosisi;
        for ($i = 0; $i < 5; $i++) {
            Pemain::create([
                'nama_pemain' => fake()->name(),
                'no_punggung' => fake()->numberBetween(0, 99),
                'posisi' => $posisi[random_int(0, count($posisi) - 1)]
            ]);
        }
    }
}
