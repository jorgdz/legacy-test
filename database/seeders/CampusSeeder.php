<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('campus')->insert(
            ['cam_name' => 'Prosperina' ,'cam_description' => 'Prosperina' ,'cam_direction' => 'Prosperina' ,'cam_initials' => 'pros' ,'status_id' => 1 ,'company_id' => 1]
        );
    }
}
