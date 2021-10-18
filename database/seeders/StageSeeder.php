<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('stages')->insert([         
            ['stg_name' => 'Administrativos Registro', 'stg_description' => 'Registro de materias por administrativo', 'stg_acronym' => 'ARMAES', 'status_id' =>1],
        ]);
    }
}
