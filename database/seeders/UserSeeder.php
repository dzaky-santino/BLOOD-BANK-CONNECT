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
            ],
        ];

        DB::table('users')->insert($user);
    }
}
