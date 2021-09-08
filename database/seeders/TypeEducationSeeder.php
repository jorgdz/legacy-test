<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_education')->insert([
            ['typ_edu_name' => 'Sin Estudios',  'typ_edu_description' => 'Tipo Sin estudios',   'status_id' => 1],
            ['typ_edu_name' => 'Primaria',      'typ_edu_description' => 'Tipo Primaria',       'status_id' => 1],
            ['typ_edu_name' => 'Secundaria',    'typ_edu_description' => 'Tipo Secundaria',     'status_id' => 1],
            ['typ_edu_name' => 'Bachillerato',  'typ_edu_description' => 'Tipo Bachillerato',   'status_id' => 1],
            ['typ_edu_name' => 'Tercer Nivel',  'typ_edu_description' => 'Tipo Tercer nivel',   'status_id' => 1],
            ['typ_edu_name' => 'Cuarto Nivel',  'typ_edu_description' => 'Tipo Cuarto nivel',   'status_id' => 1],
            ['typ_edu_name' => 'Doctorado',     'typ_edu_description' => 'Tipo Doctorado',      'status_id' => 1],
        ]);
    }
}
