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
                'name' => 'Makruf Mulyono',
                'email' => 'tanialpukatsidorejo@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Achamad Loco Dzulqarnain',
                'email' => 'aandzulqarnain1905@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'pegawai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agus Suprapno',
                'email' => 'bimakampret07@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'petani',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
