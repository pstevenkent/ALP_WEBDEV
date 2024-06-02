<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            'name' => "Espresso",
            'description' => "double shot of espresso",
            'price' => 20,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "Black",
            'description' => "double shot of espresso and water",
            'price' => 25,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "White 6 oz / Capp",
            'description' => "single shot of espresso and milk in 6 oz cup",
            'price' => 28,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "White 8 oz / Latte",
            'description' => "single shot of espresso and milk in 8 oz cup",
            'price' => 30,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "White 8 oz / Latte",
            'description' => "single shot of espresso and milk in 8 oz cup",
            'price' => 30,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "Split",
            'description' => "single shot of espresso and white 6 oz",
            'price' => 40,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "Hana's Cafe Au Lait",
            'description' => "our take on 'es kopi susu' topped with tiramisu cold foam",
            'price' => 32,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "Dirty Matcha",
            'description' => "creamy matcha, milk, and espresso",
            'price' => 43,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "Mocha",
            'description' => "chocolate by korte, milk, and espresso",
            'price' => 40,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "Biscoff Sea Salt Latte",
            'description' => "Espresso, milk, vanilla topped with sea salt foam & biscoff",
            'price' => 40,
            'category_id' => 2
        ]);

        DB::table('menus')->insert([
            'name' => "Matcha",
            'description' => "creamy matcha and milk",
            'price' => 38,
            'category_id' => 3
        ]);

        DB::table('menus')->insert([
            'name' => "Chocolate",
            'description' => "chocolate by korte and milk",
            'price' => 35,
            'category_id' => 3
        ]);

        DB::table('menus')->insert([
            'name' => "Peach",
            'description' => "Cold brew, Peach, Vanilla, Tonic, Grenadine",
            'price' => 35,
            'category_id' => 4

        ]);

        DB::table('menus')->insert([
            'name' => "Valentine",
            'description' => "Espresso, Cranberry, Strawberry, Cinnamon, Grenadine Foam",
            'price' => 35,
            'category_id' => 4

        ]);

        DB::table('menus')->insert([
            'name' => "Summer's Day",
            'description' => "Cinnamon, Black tea, Tonic, Apple, Tropical, Caramel",
            'price' => 35,
            'category_id' => 4

        ]);

        DB::table('menus')->insert([
            'name' => "Moonglow",
            'description' => "Espresso, Blueberry, Strawberry, Peach, Vanilla, Tonic",
            'price' => 35,
            'category_id' => 4
        ]);
    }
}
