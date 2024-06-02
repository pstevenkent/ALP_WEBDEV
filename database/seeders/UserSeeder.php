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
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@admin.admin",
            'password' => bcrypt('admin'),
            'role_id' => "1",
        ]);

        DB::table('users')->insert([
            'name' => "user",
            'email' => "user@user.user",
            'password' => bcrypt('user'),
            'role_id' => "2",
        ]);
    }
}
