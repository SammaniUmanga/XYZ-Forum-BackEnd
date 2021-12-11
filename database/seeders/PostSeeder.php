<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            "posted_by" => 1,
            "post_description" => "This is product Catalog",
            "approve_status" => 1,
            "reject_reason" => null,
            "deleted_by" => 0,
            "deleted" => 0,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table('posts')->insert([
            "posted_by" => 2,
            "post_description" => "This is product info",
            "approve_status" => 0,
            "reject_reason" => null,
            "deleted_by" => 0,
            "deleted" => 0,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
    }
}
