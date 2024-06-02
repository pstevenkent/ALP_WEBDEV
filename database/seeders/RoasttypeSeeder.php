<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoasttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roasttypes')->insert([
            'name' => "Filter",
        ]);

        DB::table('roasttypes')->insert([
            'name' => "Espresso",
        ]);

        DB::table('roasttypes')->insert([
            'name' => "Omni",
        ]);
    }
}
