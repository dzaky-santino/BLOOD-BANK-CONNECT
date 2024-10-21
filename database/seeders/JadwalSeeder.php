<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'jadwal' => '08:00 - 12:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'jadwal' => '13:00 - 17:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan lebih banyak entri jam operasional dokter di sini
        ];

        // Masukkan data ke dalam tabel 'jam_operasional_dokters'
        DB::table('jadwals')->insert($data);
    }
}
