<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_periods')->insert([
            ['tp_name' => 'Semestre', 'tp_description' => 'Semestre description', 'status_id' => 1],
            ['tp_name' => 'Trimestre', 'tp_description' => 'Trimestre description', 'status_id' => 1],
            ['tp_name' => 'Bimestre', 'tp_description' => 'Bimestre description', 'status_id' => 1],
            ['tp_name' => 'Intensivo', 'tp_description' => 'Intensivo description', 'status_id' => 1],
            ['tp_name' => 'Profesionalismo', 'tp_description' => 'Profesionalismo description', 'status_id' => 1],
            ['tp_name' => 'Curso', 'tp_description' => 'Curso description', 'status_id' => 1],
            ['tp_name' => 'Anual', 'tp_description' => 'Anual description', 'status_id' => 1],
            ['tp_name' => 'Ordinario', 'tp_description' => 'Ordinario description', 'status_id' => 1],
            ['tp_name' => 'Extraordinario', 'tp_description' => 'Extraordinario description', 'status_id' => 1],
            ['tp_name' => 'Otros', 'tp_description' => 'Otros description', 'status_id' => 1],
        ]);
    }
}
