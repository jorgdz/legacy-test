<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('modalities')->insert(
            ['mod_name' => 'Presencial'
             ,'mod_description' => 'Presencial'
             ,'status_id' => 1
            ]
        );
    }
}
