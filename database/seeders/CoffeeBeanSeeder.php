<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CoffeeBeanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coffee_beans')->insert([
            'name' => "Ethiopia Samii Konga #3",
            'image' => "ethiopiasamiikonga.png",
            'origin' => "Yirgacheffe, Ethiopia",
            'process' => "Full Wash",
            'elevation' => "1950 masl",
            'notes' => "Floral, Peach, Mandarin, Brown Sugar, Honey, Black Tea",
            'description' => "A classic Ethiopian washed coffee from our favourite sourcing partner, Nordic Approach! Floral with a lot of peach and orange followed by sweet sweet honey and brown sugar. What more could you ask for a washed Ethiopian coffee!?",
            'weight' => 100,
            'price' => 105,
            'stock' => 8,
            'availability' => true,
            'producer_id' => 1,
            'varietal_id' => 1,
            'roasttype_id' => 1,
        ]); 

        DB::table('coffee_beans')->insert([
            'name' => "Kamojang AN 144",
            'image' => "kamojangan144.png",
            'origin' => "Kamojang, West Java",
            'process' => "Anaerobic Natural 144 hr",
            'elevation' => "1300 - 1500 masl",
            'notes' => "Berries, Mango, Sweet Tea, Caramel",
            'description' => "This is our first time working together with Sixty Percent Coffee from Kamojang. Just a few months ago, we've got a few samples from them and we just love their whole offerings when we cupped it! They offer some amazing naturals as well as experimental processing methods and this is one of the best coffee we've tried from them. This 144 Anaerobic Natural offers a very sweet, delicate and clean coffee. Yup, not your usual fermented naturals!",
            'weight' => 100,
            'price' => 85,
            'stock' => 3,
            'availability' => true,
            'producer_id' => 1,
            'varietal_id' => 1,
            'roasttype_id' => 1,
        ]);

        DB::table('coffee_beans')->insert([
            'name' => "East Manglayang",
            'image' => "eastmanglayang.png",
            'origin' => "East Manglayang, West Java",
            'process' => "Dry Anaerobic Washed",
            'elevation' => "1550-1600 masl",
            'notes' => "Jasmine, Bergamot, Lemon, Green Apple",
            'description' => "We love washed coffee and thats why we are so picky when it comes to sourcing a good washed coffee. However, this washed coffee from East Manglayang blows our mind because it reminds us of Ethiopian washed coffee. Just like Ethiopian coffee, this coffee is floral, clean, with a clear citrus notes and bright acidity. Truly amazing washed coffee that we could drink everyday.",
            'weight' => 150,
            'price' => 120,
            'stock' => 13,
            'availability' => true,
            'producer_id' => 1,
            'varietal_id' => 1,
            'roasttype_id' => 1,
        ]);

        DB::table('coffee_beans')->insert([
            'name' => "Panama Janson Lot 136",
            'image' => "jansonlot136.png",
            'origin' => "Panama",
            'process' => "Natural",
            'elevation' => "",
            'notes' => "Lavender, White Grapes, Papaya, Strawberry",
            'description' => "Who doesn't know Panama Janson. Janson Coffee is a coffee producer from Panama who has won many awards including Best of Panama and whose coffee has been used to win multiple championships. This year, coffee from Janson has been used to won the 1st place of World Barista Championship as well.

            This Lot 136 is an amazing Green-tip Geisha. In our opinion, this Natural Geisha is very very clean for a Natural coffee. It combines the floral aromatic and clarity of a washed geisha with the elegance of a carefully natural processed coffee, creating one of the most elegant Geisha that we ever tried.",
            'weight' => 100,
            'price' => 550,
            'stock' => 2,
            'availability' => true,
            'producer_id' => 1,
            'varietal_id' => 1,
            'roasttype_id' => 1,
        ]);

        DB::table('coffee_beans')->insert([
            'name' => "Bali Catur Village",
            'image' => "balicaturvillage.png",
            'origin' => "Catur Village, Bali",
            'process' => "Natural",
            'elevation' => "1400 mdpl",
            'notes' => "Acacia Flower, Berries, Orange, Honey, Tea",
            'description' => "Finally we got to see coffees from Bai again in our line up! This Bali Catur Village is a coffee that is processed by our dear friend, Ivan PS from Fumidai Coffee Jakarta. This coffee is processed using a classic natural method in which the coffee cherries are dried for 25 days. It's a very clean natural calssic coffee with notes of acacia flower, berries, orange, honey, and tea.",
            'weight' => 100, // You can adjust this based on your packaging options
            'price' => 85, // Set your price
            'stock' => 6, // Set your stock
            'availability' => true,
            'producer_id' => 1,
            'varietal_id' => 1,
            'roasttype_id' => 1,
        ]);
    }
}
