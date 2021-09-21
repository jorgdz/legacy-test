<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('companies')->insert(
            ['co_name' => 'ESPOL'
             ,'co_description' => 'ESPOL'
             ,'co_website' => 'espol.edu.ec'
             ,'status_id' => 1
            ],
            ['co_name' => 'ECOTEC'
             ,'co_description' => 'ECOTEC'
             ,'co_website' => 'ecotec.edu.ec'
             ,'status_id' => 1
            ]
        );
    }
}
