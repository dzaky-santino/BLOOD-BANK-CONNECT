<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'dzaky santino',
                'email' => 'dzaky@admin.com',
                'password' => Hash::make('dzaky123'),
                'role' => 'admin',
                'image' => null,
                'created_at' => '2024-05-20 01:44:12',
                'updated_at' => '2024-05-20 01:44:12',
            ],
        ];

        DB::table('users')->insert($user);
    }
}
