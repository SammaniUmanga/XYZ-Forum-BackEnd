<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replies')->insert([
            "comment_id" => 1,
            "replied_by" => 2,
            "reply_description" => "This is test reply",
            "deleted_by" => 0,
            "deleted" => 0,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

    }
}
