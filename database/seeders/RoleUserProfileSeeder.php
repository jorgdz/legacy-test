<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('model_has_roles')->insert([
            ['role_id' => 1, 'model_type' => 'App\Models\UserProfile', 'model_id' => 1],
        ]);
    }
}
