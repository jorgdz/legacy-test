<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Esta información debe agruparse por el parent_id
        DB::connection('tenant')->table('type_criterias')->insert([
            ['crit_name' => 'Portafolio del Postulante', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => null],
            ['crit_name' => 'Formulario de Admisión', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 1],
            ['crit_name' => 'Documentos personales', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 1],
            ['crit_name' => 'Titulo de Grado', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 1],
            ['crit_name' => 'Profeciciente en idioma ingles', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 1],
            ['crit_name' => 'Referencias académicas', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 1],

            ['crit_name' => 'Factores diferenciales', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => null],
            ['crit_name' => 'Experiencia en investigación', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 7],
            ['crit_name' => 'Conocimiento de otros idiomas', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 7],
            ['crit_name' => 'Motivación (Carta de intención)', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 7],
            ['crit_name' => 'Observaciones', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 7],

            ['crit_name' => 'Prueba Psicotécnica', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => null],
            ['crit_name' => 'Resultado de la prueba', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 12],
            ['crit_name' => 'Observaciones', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 12],

            ['crit_name' => 'Entrevista', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => null],
            ['crit_name' => 'Motivación para cursar el programa de postgrado', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 15],
            ['crit_name' => 'Proyección en el largo plazo', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 15],
            ['crit_name' => 'Expresión Oral', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 15],
            ['crit_name' => 'Expresión Corporal', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 15],
            ['crit_name' => 'Capacidad crítica', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 15],
            ['crit_name' => 'Observaciones', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 15],
            ['crit_name' => 'Recomendación Final', 'crit_description' => '', 'crit_acronym' => '', 'status_id' => 1 , 'offer_id' => 1, 'crit_parent_id' => 15],
        ]);
    }
}
