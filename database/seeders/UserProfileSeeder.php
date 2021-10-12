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
            ['user_id' => 1, 'profile_id' => 3, 'email' => 'jsanchez@redlinks.com.ec', 'status_id' => 1],
            ['user_id' => 2, 'profile_id' => 3, 'email' => 'jdiaz@redlinks.com.ec', 'status_id' => 1],
            ['user_id' => 2, 'profile_id' => 4, 'email' => 'clata@redlinks.com.ec', 'status_id' => 1]
        ]);
    }
}
