<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ["Admin", "Customer"];

        foreach($roles as $role){
            DB::table('user_roles')->insert([
                "role_code" => "RL". rand(10000000, 99999999),
                "role_name" => $role,
                "role_description" => $role. " description here",
                "enabled" => 1,
                "deleted" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
