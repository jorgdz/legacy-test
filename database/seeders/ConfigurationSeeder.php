<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('configurations')->insert([
            ['co_name' => 'Maximo Numero materias reprobada', 'co_description' => 'El Maximo Numero materias que puede reprobar un estudiante', 'co_value' => '2','co_keyword'=>'max-num-materias-reprobadas', 'status_id' =>1],
        ]);
    }
}
