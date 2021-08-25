<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('user_profiles')->insert([
            ['user_id' => 1, 'profile_id' => 1, 'status_id' => 1]
        ]);
    }
}