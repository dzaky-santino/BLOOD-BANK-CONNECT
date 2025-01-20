<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $blood = [
            [
                'gol_darah' => 'A+',
                'stok' => 135,
            ],
            [
                'gol_darah' => 'B+',
                'stok' => 532,
            ],
            [
                'gol_darah' => 'AB+',
                'stok' => 743,
            ],
            [
                'gol_darah' => 'O+',
                'stok' => 156,
            ],
            [
                'gol_darah' => 'A-',
                'stok' => 885,
            ],
            [
                'gol_darah' => 'B-',
                'stok' => 346,
            ],
            [
                'gol_darah' => 'AB-',
                'stok' => 953,
            ],
            [
                'gol_darah' => 'O-',
                'stok' => 495,
            ],
        ];

        DB::table('bank_darah')->insert($blood);
    }
}
