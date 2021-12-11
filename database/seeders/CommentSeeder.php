<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            "post_id" => 1,
            "commented_by" => 1,
            "comment_description" => "This is test comment",
            "deleted_by" => 0,
            "deleted" => 0,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

    }
}
