<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('concerts')->insert([
            'concert_name' => 'Italo on fire',
            'price' => 22000,
            'stock' => 300,
            'date' => date('Y-m-d', strtotime('2023-08-16')),
        ]);

        DB::table('concerts')->insert([
            'concert_name' => 'Adele at the party',
            'price' => 25000,
            'stock' => 0,
            'date' => date('Y-m-d', strtotime('2023-08-18')),
        ]);

        DB::table('concerts')->insert([
            'concert_name' => 'Spike on the floor',
            'price' => 35000,
            'stock' => 125,
            'date' => date('Y-m-d', strtotime('2023-08-20')),
        ]);

        DB::table('concerts')->insert([
            'concert_name' => 'The story in 1999',
            'price' => 30000,
            'stock' => 0,
            'date' => date('Y-m-d', strtotime('2023-09-07')),
        ]);
    }
}
