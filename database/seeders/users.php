<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'password' => bcrypt('passwordAdmin'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'pengguna',
            'password' => bcrypt('password'),
            'role' => 'pengguna',
        ]);
    }
}
