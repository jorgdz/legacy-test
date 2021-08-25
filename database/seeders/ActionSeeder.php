<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('action_directories')->insert([
            ['actd_name' => 'Accion 1', 'actd_description' => '', 'actd_route' => '', 'actd_initial' => 'SVG', 'directory_id' => 1, 'status_id' => 1], 
            ['actd_name' => 'Accion 2', 'actd_description' => '', 'actd_route' => '', 'actd_initial' => 'AVG', 'directory_id' => 2, 'status_id' => 1], 
            ['actd_name' => 'Accion 3', 'actd_description' => '', 'actd_route' => '', 'actd_initial' => 'GIT', 'directory_id' => 2, 'status_id' => 1], 
        ]);
    }
}
