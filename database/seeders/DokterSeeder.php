<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokter = [
            [
                'nama' => 'Dzaky ',
                'kontak' => '083456783456',
                'jk' => 'Laki-Laki',
                'image' => '1719376403.jpg',
            ]
        ];

        DB::table('dokter')->insert($dokter);
    }
}
