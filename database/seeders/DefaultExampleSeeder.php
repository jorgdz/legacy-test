<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/*
 No agregar este seeder al DatabaseSeeder
*/
class DefaultExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('companies')->insert([
            ['co_name' => 'com1 name', 'co_description' => 'com1 desc', 'co_website' => 'comp1.test.com', 'co_assigned_site' => 'comp1.v2.test.com', 'co_facebook' => 'com1fb', 'co_instagram' => 'com1ig', 'co_linkedin' => 'com1link', 'co_youtube' => 'comp1yt', 'co_info_mail' => 'com1@gmail.com', 'co_matrix' => 'comp1 matrix', 'co_logo' => 'logo.png', 'co_color' => '#f2f2f2', 'co_pay_notification' => 'not1', 'co_ruc' => '0943909034001', 'co_business_name' => 'comp 1rs', 'co_comercial_name' => 'name', 'co_legal_identification' => '0989239045', 'co_agent_legal' => '0989239045', 'co_person_type' => 'per1', 'co_direction' => 'nfierio', 'co_phone' => '0945656563', 'co_email' => 'emai@gmail.com', 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('campus')->insert([
            ['cam_name' => 'La mejor sede', 'cam_description' => 'Descripción de la mejor sede', 'cam_direction' => '', 'cam_initials' => 'mse', 'status_id' => 1, 'company_id' => 1],
            ['cam_name' => 'Nuevo', 'cam_description' => 'Nueva sede', 'cam_direction' => '', 'cam_initials' => 'nse', 'status_id' => 1, 'company_id' => 1],
        ]);

        DB::connection('tenant')->table('periods')->insert([
            ['per_name' => 'Periodo 2 Nuevo', 'per_reference' => 'Periodo 2 Referencia', 'per_current_year' => 2021, 'per_due_year' => '2022', 'per_min_matter_enrollment' => 1, 'per_max_matter_enrollment' => 3, 'campus_id' => 1, 'type_period_id' => 1, 'status_id' => 1],
            ['per_name' => 'Periodo 1', 'per_reference' => 'Periodo 1 Referencia', 'per_current_year' => 2021, 'per_due_year' => '2022', 'per_min_matter_enrollment' => 1, 'per_max_matter_enrollment' => 3, 'campus_id' => 1, 'type_period_id' => 1, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('type_califications')->insert([
            ['tc_name' => 'Tipo de calificación 1', 'tc_description' => 'Descripción del tipo de calificación 1', 'status_id' => 1],
            ['tc_name' => 'Tipo de calificación 2', 'tc_description' => 'Descripción del tipo de calificación 2', 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('pensums')->insert([
            ['pen_name' => 'Pensum del año', 'pen_description' => '', 'pen_acronym' => 'p01', 'anio' => 2021, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('offers')->insert([
            ['off_name' => 'Oferta de ejemplo', 'off_description' => 'Descripción de dicha oferta', 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('offer_period')->insert([
            ['period_id' => 1, 'offer_id' => 1],
            ['period_id' => 2, 'offer_id' => 1],
        ]);

        DB::connection('tenant')->table('education_levels')->insert([
            ['edu_name' => 'Facultad de Derecho y Gobernabilidad', 'edu_alias' => '', 'edu_order' => 1, 'principal_id' => null, 'offer_id' => 1, 'status_id' => 1],
            ['edu_name' => 'Carrera de Derecho', 'edu_alias' => '', 'edu_order' => 1, 'principal_id' => 1, 'offer_id' => 1, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('meshs')->insert([
            ['mes_name' => 'Malla Curricular', 'mes_description' => '', 'mes_acronym' => 'm1', 'pensum_id' => 1, 'level_edu_id' => 2, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('matters')->insert([
            ['mat_name' => 'Derecho Romano', 'mat_description' => '', 'mat_acronym' => 'mat', 'cod_matter_migration' => 'COD-MAT001', 'cod_old_migration' => 'CODOLD-MAT001', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 9, 'status_id' => 1],
            ['mat_name' => 'Ciencias Políticas', 'mat_description' => '', 'mat_acronym' => 'lco', 'cod_matter_migration' => 'COD-MAT002', 'cod_old_migration' => 'CODOLD-MAT002', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Introducción y Fundamentos del Derecho', 'mat_description' => '', 'mat_acronym' => 'his', 'cod_matter_migration' => 'COD-MAT003', 'cod_old_migration' => 'CODOLD-MAT003', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Historia y Filosofía del Derecho', 'mat_description' => '', 'mat_acronym' => 'ca1', 'cod_matter_migration' => 'COD-MAT004', 'cod_old_migration' => 'CODOLD-MAT004', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Gramática y Redacción', 'mat_description' => '', 'mat_acronym' => 'ca2', 'cod_matter_migration' => 'COD-MAT005', 'cod_old_migration' => 'CODOLD-MAT005', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Comunicación Interpersonal y Grupal', 'mat_description' => '', 'mat_acronym' => 'ca3', 'cod_matter_migration' => 'COD-MAT006', 'cod_old_migration' => 'CODOLD-MAT006', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Constitucional General', 'mat_description' => '', 'mat_acronym' => 'f1', 'cod_matter_migration' => 'COD-MAT0017', 'cod_old_migration' => 'CODOLD-MAT0017', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Civil de Personas', 'mat_description' => '', 'mat_acronym' => 'f2', 'cod_matter_migration' => 'COD-MAT0010', 'cod_old_migration' => 'CODOLD-MAT0010', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Penal I', 'mat_description' => '', 'mat_acronym' => 'md', 'cod_matter_migration' => 'COD-MAT0011', 'cod_old_migration' => 'CODOLD-MAT0011', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Teoría General del Proceso', 'mat_description' => '', 'mat_acronym' => 'est', 'cod_matter_migration' => 'COD-MAT0200', 'cod_old_migration' => 'CODOLD-MAT0200', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Ética y Emprendimiento', 'mat_description' => '', 'mat_acronym' => 'p1', 'cod_matter_migration' => 'COD-MAT0012', 'cod_old_migration' => 'CODOLD-MAT0012', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Sociología Criminal', 'mat_description' => '', 'mat_acronym' => 'esd', 'cod_matter_migration' => 'COD-MAT00100', 'cod_old_migration' => 'CODOLD-MAT00100', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Administrativo', 'mat_description' => '', 'mat_acronym' => 'poo', 'cod_matter_migration' => 'COD-MAT00101', 'cod_old_migration' => 'CODOLD-MAT00101', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Civil Bienes I', 'mat_description' => '', 'mat_acronym' => 'iso', 'cod_matter_migration' => 'COD-MAT00102', 'cod_old_migration' => 'CODOLD-MAT00102', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho de Familia', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Penal II', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Internacional Público', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Metodología de Investigación', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Procesal Constitucional', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Civil Bienes II', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Procedimiento Penal', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Teoría General de los Actos Jurídicos', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Municipal y Gobiernos Locales', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Ambiental', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derechos de las Obligaciones', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Procedimiento Civil I', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Mercantil', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Métodos Alternos de Solución de Conflictos', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Asignatura I del Itinerario', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho de Contratos I', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Procedimiento Civil II', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Societario', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Propiedad Intelectual', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Asignatura II del Itinerario', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho de Contratos II', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Tributario', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Sucesiones', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho del Trabajo', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Práctica Civil', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Proyecto Integrador', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho Internacional Privado', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00104', 'cod_old_migration' => 'CODOLD-MAT00104', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Derecho de Recursos no Renovables', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00305', 'cod_old_migration' => 'CODOLD-MAT00305', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
            ['mat_name' => 'Asignatura III del Itinerario', 'mat_description' => '', 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT00304', 'cod_old_migration' => 'CODOLD-MAT00304', 'type_matter_id' => 1, 'type_calification_id' => 1, 'min_note' => 7, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('matter_mesh')->insert([
            ['mesh_id' => 1, 'matter_id' => 1, 'calification_type' => 'Algun modelo de calificacion en particular', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Matemática básica', 'clasification_matter' => '', 'group' => 'uno', 'order' => 1, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 2, 'calification_type' => 'Modelo de calificación 2', 'min_calification' => 7, 'num_fouls' => 3, 'matter_rename' => 'Lenguaje y comunicación', 'clasification_matter' => '', 'group' => 'uno', 'order' => 2, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 3, 'calification_type' => 'Modelo de calificación 3', 'min_calification' => 7, 'num_fouls' => 4, 'matter_rename' => 'Historia del Ecuador', 'clasification_matter' => '', 'group' => 'uno', 'order' => 3, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 4, 'calification_type' => 'Modelo de calificación 4', 'min_calification' => 7, 'num_fouls' => 4, 'matter_rename' => 'Cálculo diferencial integral 1', 'clasification_matter' => '', 'group' => 'uno', 'order' => 4, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 5, 'calification_type' => 'Modelo de calificación 5', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Cálculo diferencial integral 2', 'clasification_matter' => '', 'group' => 'uno', 'order' => 5, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 6, 'calification_type' => 'Modelo de calificación 6', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Cálculo diferencial integral 3', 'clasification_matter' => '', 'group' => 'uno', 'order' => 6, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 7, 'calification_type' => 'Modelo de calificación 7', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Constitucional General', 'clasification_matter' => '', 'group' => 'dos', 'order' => 7, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 8, 'calification_type' => 'Modelo de calificación 8', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Civil de Personas', 'clasification_matter' => '', 'group' => 'dos', 'order' => 8, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 9, 'calification_type' => 'Modelo de calificación 9', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Penal I', 'clasification_matter' => '', 'group' => 'dos', 'order' => 9, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 10, 'calification_type' => 'Modelo de calificación 10', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Teoría General del Proceso', 'clasification_matter' => '', 'group' => 'dos', 'order' => 10, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 11, 'calification_type' => 'Modelo de calificación 11', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Ética y Emprendimiento', 'clasification_matter' => '', 'group' => 'dos', 'order' => 11, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 12, 'calification_type' => 'Modelo de calificación 12', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Sociología Criminal', 'clasification_matter' => '', 'group' => 'dos', 'order' => 12, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 13, 'calification_type' => 'Modelo de calificación 13', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Administrativo', 'clasification_matter' => '', 'group' => 'tres', 'order' => 13, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 14, 'calification_type' => 'Modelo de calificación 14', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Civil Bienes I', 'clasification_matter' => '', 'group' => 'tres', 'order' => 14, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 15, 'calification_type' => 'Modelo de calificación 15', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho de Familia', 'clasification_matter' => '', 'group' => 'tres', 'order' => 15, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 16, 'calification_type' => 'Modelo de calificación 16', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Penal II', 'clasification_matter' => '', 'group' => 'tres', 'order' => 16, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 17, 'calification_type' => 'Modelo de calificación 17', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Internacional Público', 'clasification_matter' => '', 'group' => 'tres', 'order' => 17, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 18, 'calification_type' => 'Modelo de calificación 18', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Metodología de Investigación', 'clasification_matter' => '', 'group' => 'tres', 'order' => 18, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 19, 'calification_type' => 'Modelo de calificación 19', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Procesal Constitucional', 'clasification_matter' => '', 'group' => 'cuatro', 'order' => 19, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 20, 'calification_type' => 'Modelo de calificación 20', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Derecho Civil Bienes II', 'clasification_matter' => '', 'group' => 'cuatro', 'order' => 20, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 21, 'calification_type' => 'Modelo de calificación 21', 'min_calification' => 8, 'num_fouls' => 4, 'matter_rename' => 'Procedimiento Penal', 'clasification_matter' => '', 'group' => 'cuatro', 'order' => 21, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 22, 'calification_type' => 'Modelo de calificación 22', 'min_calification' => 8, 'num_fouls' => 5, 'matter_rename' => 'Teoría General de los Actos Jurídicos', 'clasification_matter' => '', 'group' => 'cuatro', 'order' => 22, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 23, 'calification_type' => 'Modelo de calificación 23', 'min_calification' => 7, 'num_fouls' => 5, 'matter_rename' => 'Derecho Municipal y Gobiernos Locales', 'clasification_matter' => '', 'group' => 'cuatro', 'order' => 23, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 24, 'calification_type' => 'Modelo de calificación 24', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Derecho Ambiental', 'clasification_matter' => '', 'group' => 'cuatro', 'order' => 24, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 25, 'calification_type' => 'Modelo de calificación 25', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Derechos de las Obligaciones', 'clasification_matter' => '', 'group' => 'cinco', 'order' => 25, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 26, 'calification_type' => 'Modelo de calificación 26', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Procedimiento Civil I', 'clasification_matter' => '', 'group' => 'cinco', 'order' => 26, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 27, 'calification_type' => 'Modelo de calificación 27', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Derecho Mercantil', 'clasification_matter' => '', 'group' => 'cinco', 'order' => 27, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 28, 'calification_type' => 'Modelo de calificación 28', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Métodos Alternos de Solución de Conflictos', 'clasification_matter' => '', 'group' => 'cinco', 'order' => 28, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 29, 'calification_type' => 'Modelo de calificación 29', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Asignatura I del Itinerario', 'clasification_matter' => '', 'group' => 'cinco', 'order' => 29, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 30, 'calification_type' => 'Modelo de calificación 30', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Derecho de Contratos I', 'clasification_matter' => '', 'group' => 'seis', 'order' => 30, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 31, 'calification_type' => 'Modelo de calificación 31', 'min_calification' => 7, 'num_fouls' => 2, 'matter_rename' => 'Procedimiento Civil II', 'clasification_matter' => '', 'group' => 'seis', 'order' => 31, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 32, 'calification_type' => 'Modelo de calificación 32', 'min_calification' => 7, 'num_fouls' => 3, 'matter_rename' => 'Derecho Societario', 'clasification_matter' => '', 'group' => 'seis', 'order' => 32, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 33, 'calification_type' => 'Modelo de calificación 33', 'min_calification' => 7, 'num_fouls' => 3, 'matter_rename' => 'Propiedad Intelectual', 'clasification_matter' => '', 'group' => 'seis', 'order' => 33, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 34, 'calification_type' => 'Modelo de calificación 34', 'min_calification' => 8, 'num_fouls' => 3, 'matter_rename' => 'Asignatura II del Itinerario', 'clasification_matter' => '', 'group' => 'seis', 'order' => 34, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 35, 'calification_type' => 'Modelo de calificación 35', 'min_calification' => 8, 'num_fouls' => 3, 'matter_rename' => 'Derecho de Contratos II', 'clasification_matter' => '', 'group' => 'siete', 'order' => 35, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 36, 'calification_type' => 'Modelo de calificación 36', 'min_calification' => 7, 'num_fouls' => 3, 'matter_rename' => 'Derecho Tributario', 'clasification_matter' => '', 'group' => 'siete', 'order' => 36, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 37, 'calification_type' => 'Modelo de calificación 37', 'min_calification' => 7, 'num_fouls' => 3, 'matter_rename' => 'Derecho Sucesiones', 'clasification_matter' => '', 'group' => 'siete', 'order' => 37, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 38, 'calification_type' => 'Modelo de calificación 38', 'min_calification' => 7, 'num_fouls' => 4, 'matter_rename' => 'Derecho del Trabajo', 'clasification_matter' => '', 'group' => 'siete', 'order' => 38, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 39, 'calification_type' => 'Modelo de calificación 39', 'min_calification' => 7, 'num_fouls' => 4, 'matter_rename' => 'Práctica Civil', 'clasification_matter' => '', 'group' => 'ocho', 'order' => 39, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 40, 'calification_type' => 'Modelo de calificación 40', 'min_calification' => 7, 'num_fouls' => 4, 'matter_rename' => 'Proyecto Integrador', 'clasification_matter' => '', 'group' => 'ocho', 'order' => 40, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 41, 'calification_type' => 'Modelo de calificación 41', 'min_calification' => 7, 'num_fouls' => 3, 'matter_rename' => 'Derecho Internacional Privado', 'clasification_matter' => '', 'group' => 'ocho', 'order' => 41, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 42, 'calification_type' => 'Modelo de calificación 42', 'min_calification' => 7, 'num_fouls' => 3, 'matter_rename' => 'Derecho de Recursos no Renovables', 'clasification_matter' => '', 'group' => 'ocho', 'order' => 42, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 43, 'calification_type' => 'Modelo de calificación 43', 'min_calification' => 7, 'num_fouls' => 3, 'matter_rename' => 'Asignatura II del Itinerario', 'clasification_matter' => '', 'group' => 'ocho', 'order' => 43, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('mat_mesh_dependencies')->insert([
            ['parent_matter_mesh_id' => 1, 'child_matter_mesh_id' => 7],
            ['parent_matter_mesh_id' => 2, 'child_matter_mesh_id' => 7],

            ['parent_matter_mesh_id' => 1, 'child_matter_mesh_id' => 8],

            ['parent_matter_mesh_id' => 3, 'child_matter_mesh_id' => 9],

            ['parent_matter_mesh_id' => 3, 'child_matter_mesh_id' => 10],

            ['parent_matter_mesh_id' => 3, 'child_matter_mesh_id' => 12],

            ['parent_matter_mesh_id' => 7, 'child_matter_mesh_id' => 13],

            ['parent_matter_mesh_id' => 8, 'child_matter_mesh_id' => 14],

            ['parent_matter_mesh_id' => 8, 'child_matter_mesh_id' => 15],
            ['parent_matter_mesh_id' => 9, 'child_matter_mesh_id' => 15],

            ['parent_matter_mesh_id' => 9, 'child_matter_mesh_id' => 16],

            ['parent_matter_mesh_id' => 7, 'child_matter_mesh_id' => 17],

            ['parent_matter_mesh_id' => 13, 'child_matter_mesh_id' => 19],
            ['parent_matter_mesh_id' => 7, 'child_matter_mesh_id' => 19],

            ['parent_matter_mesh_id' => 14, 'child_matter_mesh_id' => 20],

            ['parent_matter_mesh_id' => 10, 'child_matter_mesh_id' => 21],

            ['parent_matter_mesh_id' => 14, 'child_matter_mesh_id' => 22],

            ['parent_matter_mesh_id' => 13, 'child_matter_mesh_id' => 23],

            ['parent_matter_mesh_id' => 13, 'child_matter_mesh_id' => 24],

            ['parent_matter_mesh_id' => 19, 'child_matter_mesh_id' => 25],

            ['parent_matter_mesh_id' => 22, 'child_matter_mesh_id' => 26],

            ['parent_matter_mesh_id' => 22, 'child_matter_mesh_id' => 27],

            ['parent_matter_mesh_id' => 21, 'child_matter_mesh_id' => 29],

            ['parent_matter_mesh_id' => 25, 'child_matter_mesh_id' => 30],

            ['parent_matter_mesh_id' => 26, 'child_matter_mesh_id' => 31],

            ['parent_matter_mesh_id' => 25, 'child_matter_mesh_id' => 32],

            ['parent_matter_mesh_id' => 26, 'child_matter_mesh_id' => 33],

            ['parent_matter_mesh_id' => 29, 'child_matter_mesh_id' => 34],
            ['parent_matter_mesh_id' => 27, 'child_matter_mesh_id' => 34],

            ['parent_matter_mesh_id' => 30, 'child_matter_mesh_id' => 35],

            ['parent_matter_mesh_id' => 32, 'child_matter_mesh_id' => 36],

            ['parent_matter_mesh_id' => 30, 'child_matter_mesh_id' => 37],

            ['parent_matter_mesh_id' => 30, 'child_matter_mesh_id' => 38],

            ['parent_matter_mesh_id' => 35, 'child_matter_mesh_id' => 39],

            ['parent_matter_mesh_id' => 36, 'child_matter_mesh_id' => 40],

            ['parent_matter_mesh_id' => 35, 'child_matter_mesh_id' => 41],

            ['parent_matter_mesh_id' => 28, 'child_matter_mesh_id' => 42],

            ['parent_matter_mesh_id' => 34, 'child_matter_mesh_id' => 43],
        ]);
    }
}
