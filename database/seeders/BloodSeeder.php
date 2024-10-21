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
                'created_at' => '2024-05-20 01:44:12',
                'updated_at' => '2024-05-20 01:44:12',
            ],
            [
                'gol_darah' => 'B+',
                'stok' => 532,
                'created_at' => '2024-05-20 01:45:53',
                'updated_at' => '2024-05-20 01:45:53',
            ],
            [
                'gol_darah' => 'AB+',
                'stok' => 743,
                'created_at' => '2024-05-20 01:46:25',
                'updated_at' => '2024-05-20 01:46:25',
            ],
            [
                'gol_darah' => 'O+',
                'stok' => 156,
                'created_at' => '2024-05-20 01:46:46',
                'updated_at' => '2024-05-20 01:46:46',
            ],
            [
                'gol_darah' => 'A-',
                'stok' => 885,
                'created_at' => '2024-05-20 02:31:58',
                'updated_at' => '2024-05-20 02:31:58',
            ],
            [
                'gol_darah' => 'B-',
                'stok' => 346,
                'created_at' => '2024-05-20 02:32:21',
                'updated_at' => '2024-05-20 02:32:21',
            ],
            [
                'gol_darah' => 'AB-',
                'stok' => 953,
                'created_at' => '2024-05-20 02:32:21',
                'updated_at' => '2024-05-20 02:32:21',
            ],
            [
                'gol_darah' => 'O-',
                'stok' => 495,
                'created_at' => '2024-05-20 02:33:31',
                'updated_at' => '2024-05-20 02:33:31',
            ],
        ];

        DB::table('bank_darah')->insert($blood);
    }
}
