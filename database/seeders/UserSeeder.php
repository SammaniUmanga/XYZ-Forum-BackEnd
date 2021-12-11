<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "user_role_id" => 1,
            "name" => "sammani",
            "email" => "sammani@gmail.com",
            "password" => hash('sha256', 'Sam@123'),
            "deleted" => 0,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('users')->insert([
            "user_role_id" => 2,
            "name" => "peter",
            "email" => "peter@gmail.com",
            "password" => hash('sha256', 'Cus@123'),
            "deleted" => 0,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
