<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Owner Demo',
                'email' => 'owner@tas.test',
                'password' => bcrypt('password'),
                'role' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pegawai Demo',
                'email' => 'pegawai@tas.test',
                'password' => bcrypt('password'),
                'role' => 'pegawai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Petani Demo',
                'email' => 'petani@tas.test',
                'password' => bcrypt('password'),
                'role' => 'petani',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}