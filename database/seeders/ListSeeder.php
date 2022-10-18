<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataBrands = [
            ['name' => 'Suzuki'],
            ['name' => 'Nissan'],
            ['name' => 'Toyota'],
            ['name' => 'Honda'],
            ['name' => 'Hyundai'],
            ['name' => 'Chevrolet'],
        ];

        $dataLine = [
            ['name' => 'comercial'],
            ['name' => 'privada']
        ];

        $dataHealth = [
            ['name' =>'Sura'],
            ['name' =>'Nueva EPS'],
            ['name' =>'Cosmitet'],
            ['name' =>'Salud total'],
            ['name' =>'Capital Salud'],
            ['name' =>'Sanitas'],
        ];

        DB::table('brands')->insert($dataBrands);
        DB::table('lines')->insert($dataLine);
        DB::table('health_companies')->insert($dataHealth);

    }
}
