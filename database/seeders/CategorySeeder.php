<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => "Coffee",
        ]);

        DB::table('categories')->insert([
            'name' => "Non-coffee",
        ]);

        DB::table('categories')->insert([
            'name' => "Tea Selections",
        ]);

        DB::table('categories')->insert([
            'name' => "Mixology",
        ]);

        DB::table('categories')->insert([
            'name' => "To-go",
        ]);
    }
}
