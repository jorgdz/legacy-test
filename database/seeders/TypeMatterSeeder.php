<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeMatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_subjects')->insert([
            ['tm_name' => 'Materias',           'tm_acronym' => 'mtr',  'tm_description' => 'Tipo Materia',             'tm_order' => 1,   'tm_cobro' => 1, 'tm_matter_count' => 1,   'status_id' => 1],
            ['tm_name' => 'Talleres',           'tm_acronym' => 'tll',  'tm_description' => 'Tipo Taller',              'tm_order' => 2,   'tm_cobro' => 1, 'tm_matter_count' => 1,   'status_id' => 1],
            ['tm_name' => 'Practicas',          'tm_acronym' => 'pra',  'tm_description' => 'Tipo Practicas',           'tm_order' => 3,   'tm_cobro' => 1, 'tm_matter_count' => 1,   'status_id' => 1],
            ['tm_name' => 'Proyecto de Grado',  'tm_acronym' => 'prg',  'tm_description' => 'Tipo Proyecto de grado',   'tm_order' => 4,   'tm_cobro' => 1, 'tm_matter_count' => 1,   'status_id' => 1],
            ['tm_name' => 'Seminario',          'tm_acronym' => 'smr',  'tm_description' => 'Tipo Seminario',           'tm_order' => 5,   'tm_cobro' => 1, 'tm_matter_count' => 1,   'status_id' => 1],
            ['tm_name' => 'Materia Pre',        'tm_acronym' => 'mtp',  'tm_description' => 'Tipo Materia pre',         'tm_order' => 6,   'tm_cobro' => 1, 'tm_matter_count' => 1,   'status_id' => 1],
            ['tm_name' => 'Laboratorio',        'tm_acronym' => 'lbt',  'tm_description' => 'Tipo Laboratorio',         'tm_order' => 7,   'tm_cobro' => 1, 'tm_matter_count' => 1,   'status_id' => 1],
        ]);
    }
}
