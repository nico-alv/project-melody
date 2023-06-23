<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Italo Donoso',
            'password' => Hash::make('Melody91'),
            'email' => 'italo.donoso@ucn.cl',
            'role' => 'Administrador',
        ]);

        DB::table('users')->insert([
            'name' => 'Jéremy Camus',
            'password' => Hash::make('jeremy123'),
            'email' => 'jeremy.camus@gmail.cl',
            'role' => 'Usuario',
        ]);

        DB::table('users')->insert([
            'name' => 'Ana Rojas',
            'password' => Hash::make('Melody91'),
            'email' => 'ana.rojas@gmail.com',
            'role' => 'Usuario',
        ]);
    }
}
