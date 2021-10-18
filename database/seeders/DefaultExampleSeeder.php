<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        DB::connection('tenant')->table('periods')->insert([
            ['per_name' => 'Periodo 1', 'per_reference' => 'Periodo 1 Referencia', 'per_current_year' => 2021, 'per_due_year' => '2022', 'per_min_matter_enrollment' => 1, 'per_max_matter_enrollment' => 3, 'per_num_fees' => 20, 'per_fees_enrollment' => 6, 'per_pay_enrollment' => 0, 'campus_id' => 1, 'type_period_id' => 1, 'status_id' => 1],
            ['per_name' => 'Periodo 2', 'per_reference' => 'Periodo 2 Referencia', 'per_current_year' => 2021, 'per_due_year' => '2022', 'per_min_matter_enrollment' => 1, 'per_max_matter_enrollment' => 3, 'per_num_fees' => 10, 'per_fees_enrollment' => 3, 'per_pay_enrollment' => 1, 'campus_id' => 1, 'type_period_id' => 1, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('stages')->insert([
            [
                'stg_name'      => 'Estudiante Periodo General',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'A',
                'status_id'         =>  1
            ],
            [
                'stg_name'      => 'Administrativos Convalidaciones',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'C',
                'status_id'         =>  1
            ],
            [
                'stg_name'      => 'Docentes Periodo General',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'D',
                'status_id'         =>  1
            ],
            [
                'stg_name'      => 'Administrativos Homologaciones',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'H',
                'status_id'         =>  1
            ],
            [
                'stg_name'      => 'Inicio de Clases',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'I',
                'status_id'         =>  1
            ],
            [
                'stg_name'      => 'Administrativos Registro',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'M',
                'status_id'         =>  1
            ],
            [
                'stg_name'      => 'Estudiante Pagos',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'P',
                'status_id'         =>  1
            ],
            [
                'stg_name'      => 'Estudiante Registros',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'R',
                'status_id'         =>  1
            ],
            [
                'stg_name'      => 'Pagos en Caja',
                'stg_description'   =>  '',
                'stg_acronym'       =>  'T',
                'status_id'         =>  1
            ],
        ]);

        DB::connection('tenant')->table('type_califications')->insert([
            ['tc_name' => 'Créditos', 'tc_description' => NULL, 'status_id' => 1],
            ['tc_name' => 'Horas', 'tc_description' => NULL, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('period_stages')->insert([
            ['stage_id' => 5, 'period_id' => 1, 'start_date' => '2021-05-11', 'end_date' => '2022-02-15', 'status_id' => 1],
            ['stage_id' => 8, 'period_id' => 1, 'start_date' => '2022-02-20', 'end_date' => '2022-04-20', 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('pensums')->insert([
            ['pen_name' => 'Pensum del año', 'pen_description' => '', 'pen_acronym' => 'p01', 'anio' => 2021, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('offer_period')->insert([
            ['period_id' => 1, 'offer_id' => 1],
            ['period_id' => 2, 'offer_id' => 1],
        ]);

        DB::connection('tenant')->table('offer_simbology')->insert([
            ['simbology_id' => 1, 'offer_id' => 1],
            ['simbology_id' => 2, 'offer_id' => 1],
            ['simbology_id' => 3, 'offer_id' => 1],
        ]);

        DB::connection('tenant')->table('group_areas')->insert([
            ['arg_name' => 'CIENCIAS EMPRESARIALES Y AFINES', 'arg_description' => '', 'arg_keywords' => 'ciencias-empresariales-fines', 'status_id' => 1],
            ['arg_name' => 'CIENCIAS SOCIALES Y AFINES', 'arg_description' => '', 'arg_keywords' => 'ciencias-sociales-fines', 'status_id' => 1],
            ['arg_name' => 'CIENCIAS DE LA SALUD Y DESARROLLO HUMANO', 'arg_description' => '', 'arg_keywords' => 'ciencias-salud-desarrollo-humano', 'status_id' => 1]
        ]);

        DB::connection('tenant')->table('education_levels')->insert([
            ['edu_name' => 'Facultad de Derecho y Gobernabilidad', 'edu_alias' => NULL, 'edu_order' => 1, 'principal_id' => null, 'group_area_id' => null, 'offer_id' => 1, 'status_id' => 1],
            ['edu_name' => 'Carrera de Derecho', 'edu_alias' => NULL, 'edu_order' => 2, 'principal_id' => 1, 'group_area_id' => 1, 'offer_id' => 1, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('subjects')->insert([
            ['mat_name' => 'Derecho Romano', 'mat_description' => NULL, 'mat_acronym' => 'mat', 'cod_matter_migration' => 'COD-MAT001', 'cod_old_migration' => 'COD-OLD-MAT001', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Ciencias Políticas', 'mat_description' => NULL, 'mat_acronym' => 'lco', 'cod_matter_migration' => 'COD-MAT002', 'cod_old_migration' => 'COD-OLD-MAT002', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Introducción y Fundamentos del Derecho', 'mat_description' => NULL, 'mat_acronym' => 'his', 'cod_matter_migration' => 'COD-MAT003', 'cod_old_migration' => 'COD-OLD-MAT003', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Historia y Filosofía del Derecho', 'mat_description' => NULL, 'mat_acronym' => 'ca1', 'cod_matter_migration' => 'COD-MAT004', 'cod_old_migration' => 'COD-OLD-MAT004', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Gramática y Redacción', 'mat_description' => NULL, 'mat_acronym' => 'ca2', 'cod_matter_migration' => 'COD-MAT005', 'cod_old_migration' => 'COD-OLD-MAT005', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Comunicación Interpersonal y Grupal', 'mat_description' => NULL, 'mat_acronym' => 'ca3', 'cod_matter_migration' => 'COD-MAT006', 'cod_old_migration' => 'COD-OLD-MAT006', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Constitucional General', 'mat_description' => NULL, 'mat_acronym' => 'f1', 'cod_matter_migration' => 'COD-MAT007', 'cod_old_migration' => 'COD-OLD-MAT007', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Civil de Personas', 'mat_description' => NULL, 'mat_acronym' => 'f2', 'cod_matter_migration' => 'COD-MAT008', 'cod_old_migration' => 'COD-OLD-MAT008', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Penal I', 'mat_description' => NULL, 'mat_acronym' => 'md', 'cod_matter_migration' => 'COD-MAT009', 'cod_old_migration' => 'COD-OLD-MAT009', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Teoría General del Proceso', 'mat_description' => NULL, 'mat_acronym' => 'est', 'cod_matter_migration' => 'COD-MAT010', 'cod_old_migration' => 'COD-OLD-MAT010', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Ética y Emprendimiento', 'mat_description' => NULL, 'mat_acronym' => 'p1', 'cod_matter_migration' => 'COD-MAT011', 'cod_old_migration' => 'COD-OLD-MAT011', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Sociología Criminal', 'mat_description' => NULL, 'mat_acronym' => 'esd', 'cod_matter_migration' => 'COD-MAT012', 'cod_old_migration' => 'COD-OLD-MAT012', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Administrativo', 'mat_description' => NULL, 'mat_acronym' => 'poo', 'cod_matter_migration' => 'COD-MAT013', 'cod_old_migration' => 'COD-OLD-MAT013', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Civil Bienes I', 'mat_description' => NULL, 'mat_acronym' => 'iso', 'cod_matter_migration' => 'COD-MAT014', 'cod_old_migration' => 'COD-OLD-MAT014', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho de Familia', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT015', 'cod_old_migration' => 'COD-OLD-MAT015', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Penal II', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT016', 'cod_old_migration' => 'COD-OLD-MAT016', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Internacional Público', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT017', 'cod_old_migration' => 'COD-OLD-MAT017', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Metodología de Investigación', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT018', 'cod_old_migration' => 'COD-OLD-MAT018', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Procesal Constitucional', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT019', 'cod_old_migration' => 'COD-OLD-MAT019', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Civil Bienes II', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT020', 'cod_old_migration' => 'COD-OLD-MAT020', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Procedimiento Penal', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT021', 'cod_old_migration' => 'COD-OLD-MAT021', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Teoría General de los Actos Jurídicos', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT022', 'cod_old_migration' => 'COD-OLD-MAT022', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Municipal y Gobiernos Locales', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT023', 'cod_old_migration' => 'COD-OLD-MAT023', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Ambiental', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT024', 'cod_old_migration' => 'COD-OLD-MAT024', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derechos de las Obligaciones', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT025', 'cod_old_migration' => 'COD-OLD-MAT025', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Procedimiento Civil I', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT026', 'cod_old_migration' => 'COD-OLD-MAT026', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Mercantil', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT027', 'cod_old_migration' => 'COD-OLD-MAT027', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Métodos Alternos de Solución de Conflictos', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT028', 'cod_old_migration' => 'COD-OLD-MAT028', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Asignatura I del Itinerario', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT029', 'cod_old_migration' => 'COD-OLD-MAT029', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho de Contratos I', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT030', 'cod_old_migration' => 'COD-OLD-MAT030', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Procedimiento Civil II', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT031', 'cod_old_migration' => 'COD-OLD-MAT031', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Societario', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT032', 'cod_old_migration' => 'COD-OLD-MAT032', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Propiedad Intelectual', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT033', 'cod_old_migration' => 'COD-OLD-MAT033', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Asignatura II del Itinerario', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT034', 'cod_old_migration' => 'COD-OLD-MAT034', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho de Contratos II', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT035', 'cod_old_migration' => 'COD-OLD-MAT035', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Tributario', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT036', 'cod_old_migration' => 'COD-OLD-MAT036', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Sucesiones', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT037', 'cod_old_migration' => 'COD-OLD-MAT037', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho del Trabajo', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT038', 'cod_old_migration' => 'COD-OLD-MAT038', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Práctica Civil', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT039', 'cod_old_migration' => 'COD-OLD-MAT039', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Proyecto Integrador', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT040', 'cod_old_migration' => 'COD-OLD-MAT040', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho Internacional Privado', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT041', 'cod_old_migration' => 'COD-OLD-MAT041', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Derecho de Recursos no Renovables', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT042', 'cod_old_migration' => 'COD-OLD-MAT042', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Asignatura III del Itinerario', 'mat_description' => NULL, 'mat_acronym' => 'ihc', 'cod_matter_migration' => 'COD-MAT043', 'cod_old_migration' => 'COD-OLD-MAT043', 'mat_translate' => NULL, 'mat_payment_type' => 'creditos', 'type_matter_id' => 1, 'education_level_id' => 1, 'area_id' => 1, 'status_id' => 1],

            ['mat_name' => 'Algebra lineal', 'mat_description' => NULL, 'mat_acronym' => 'ali', 'cod_matter_migration' => 'COD-MAT044', 'cod_old_migration' => 'COD-OLD-MAT044', 'mat_translate' => NULL, 'mat_payment_type' => 'horas', 'type_matter_id' => 6, 'education_level_id' => 2, 'area_id' => 1, 'status_id' => 1],
            ['mat_name' => 'Matemática básica', 'mat_description' => NULL, 'mat_acronym' => 'mtb', 'cod_matter_migration' => 'COD-MAT045', 'cod_old_migration' => 'COD-OLD-MAT045', 'mat_translate' => NULL, 'mat_payment_type' => 'horas', 'type_matter_id' => 6, 'education_level_id' => 2, 'area_id' => 1, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('group_area_subjects')->insert([
            ['group_nivelation_id' => 1, 'subject_id' => 44, 'status_id' => 1],
            ['group_nivelation_id' => 1, 'subject_id' => 45, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('curriculums')->insert([
            [
                'mes_name' => 'Malla Curricular', 'mes_res_cas' => NULL, 'mes_res_ocas' => NULL, 'mes_cod_career' => 'QWERTY.Q1', 'mes_title' => 'Malla Titulo', 'mes_itinerary' => NULL,
                'mes_number_matter' => 43, 'mes_number_period' => 8, 'mes_quantity_external_matter_homologate' => 1, 'mes_quantity_internal_matter_homologate' => 2, 'mes_creation_date' => '1995-07-21', 'mes_acronym' => 'MS1', 'anio' => '2018',
                'mes_modality_id' => 71, 'type_calification_id' => 2, 'level_edu_id' => 2, 'mes_description' => NULL, 'status_id' => 9
            ],
        ]);

        DB::connection('tenant')->table('persons')->insert([
            [
                'pers_identification' => '1207118470',
                'pers_firstname' => 'Carmen',
                'pers_secondname' => '',
                'pers_first_lastname' => 'Bastidas',
                'pers_second_lastname' => '',
                'pers_gender' => 'Femenino',
                'pers_date_birth' => '1993-08-15',
                'pers_direction' => 'Localhost',
                'pers_phone_home' => '4273783',
                'pers_cell' => '0978455123',
                'pers_num_child' => 0,
                'pers_profession' => 'N/A',
                'pers_num_bedrooms' => 3,
                'pers_study_reason' => 'Crear nuevas formas de generar ingreso',
                'pers_num_taxpayers_household' => 4,
                'pers_has_vehicle' => 0,
                'pers_has_disability' => 0,
                'vivienda_id' => 16,
                'type_religion_id' => 35,
                'status_marital_id' => 45,
                'city_id' => 49,
                'current_city_id' => 49,
                'sector_id' => 54,
                'ethnic_id' => 60,
                'nationality_id' => 49,
                'type_identification_id' => 67,
            ]
        ]);

        DB::connection('tenant')->table('users')->insert([
            [
                'us_username' => 'cbastidas',
                'email' => 'cbastidas@links.com.ec',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'person_id' => 3,
                'status_id' => 1,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        ]);

        DB::connection('tenant')->table('user_profiles')->insert([
            ['user_id' => 3, 'profile_id' => 4, 'email' => 'cbastidas@links.com.ec', 'status_id' => 1]
        ]);

        DB::connection('tenant')->table('model_has_roles')->insert([
            ['role_id' => 17, 'model_type' => 'App\Models\UserProfile', 'model_id' => 4]
        ]);

        DB::connection('tenant')->table('positions')->insert([
            [
                'pos_name'          => 'Docente de tiempo completo',
                'pos_description'   => '',
                'pos_keyword'       => 'docente-tm-completo',
                'role_id'           => 17,
                'department_id'     => 1,
                'status_id'         => 1
            ],
            [
                'pos_name'          => 'Encargado de logística',
                'pos_description'   => '',
                'pos_keyword'       => 'encargado-logistica',
                'role_id'           => 16,
                'department_id'     => 1,
                'status_id'         => 1
            ],
        ]);

        DB::connection('tenant')->table('collaborators')->insert([
            [
                'coll_email' => 'cbastidas@mail.com',
                'coll_type'  => 'D',
                'coll_activity'  => 'DOCENCIA',
                'coll_journey_description' => 'TC',
                'coll_dependency'       => 1,
                'coll_advice'           => 1,
                'coll_journey_hours'    => 40,
                'position_company_id'   => 1,
                'coll_entering_date'    => '2020-02-15',
                'coll_leaving_date'     => null,
                'coll_membership_num'   => null,
                'coll_contract_num'     => null,
                'coll_has_nomination'   => null,
                'coll_nomination_entering_date' =>  null,
                'coll_nomination_leaving_date'  =>  null,
                'education_level_principal_id'  =>  1,
                'status_id'                     => 1,
                'user_id'                       => 3
            ]
        ]);

        DB::connection('tenant')->table('collaborator_campus')->insert([
            [
                'collaborator_id'       => 1,
                'campus_id'             => 1,
                'status_id'             => 1,
            ],
            [
                'collaborator_id'       => 1,
                'campus_id'             => 2,
                'status_id'             => 1,
            ]
        ]);

        DB::connection('tenant')->table('collaborator_hours')->insert([
            [
                'period_id'             => 1,
                'education_level_id'    => 1,
                'ch_working_time'       => 'TC',
                'status_id'             => 1,
            ]
        ]);

        DB::connection('tenant')->table('hours_summaries')->insert([
            [
                'collaborator_id'       => 1,
                'hs_classes'            => 4,
                'hs_classes_examns_preparation'     => 4,
                'hs_tutoring'                       => 2,
                'hs_bonding'                        => 3,
                'hs_academic_management'            => 4,
                'hs_research'                       => 2,
                'hs_total'                          => 15,
                'collaborator_hour_id'              => 1,
                'status_id'                         => 1
            ]
        ]);

        DB::connection('tenant')->table('parallels')->insert([
            [
                'par_name'          => 'A',
                'par_description'   => '',
                'par_acronym'       => 'A',
                'status_id'         =>  1,
            ],
            [
                'par_name'          => 'B',
                'par_description'   => '',
                'par_acronym'       => 'B',
                'status_id'         =>  1,
            ],
            [
                'par_name'          => 'C',
                'par_description'   => '',
                'par_acronym'       => 'C',
                'status_id'         =>  1,
            ],
        ]);

        DB::connection('tenant')->table('classrooms')->insert([
            ['cl_name' => 'Aula01', 'cl_cap_max' => 40, 'cl_acronym' => 'A01', 'cl_description' => '', 'campus_id' => 1, 'classroom_type_id' => 1, 'status_id' => 1],
            ['cl_name' => 'Aula02', 'cl_cap_max' => 45, 'cl_acronym' => 'A02', 'cl_description' => '', 'campus_id' => 1, 'classroom_type_id' => 1, 'status_id' => 1],
            ['cl_name' => 'Aula03', 'cl_cap_max' => 35, 'cl_acronym' => 'A03', 'cl_description' => '', 'campus_id' => 1, 'classroom_type_id' => 1, 'status_id' => 1],
            ['cl_name' => 'Aula04', 'cl_cap_max' => 45, 'cl_acronym' => 'A04', 'cl_description' => '', 'campus_id' => 2, 'classroom_type_id' => 2, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('hourhands')->insert([
            [
                'hour_monday' => 1, 'hour_tuesday' => 1, 'hour_wednesday' => 1, 'hour_thursday' => 1, 'hour_friday' => 1, 'hour_saturday' => 0, 'hour_sunday' => 0,
                'hour_start_time_monday' => '08:00:00', 'hour_end_time_monday' => '08:30:00',
                'hour_start_time_tuesday' => '08:00:00', 'hour_end_time_tuesday' => '08:30:00',
                'hour_start_time_wednesday' => '08:00:00', 'hour_end_time_wednesday' => '08:30:00',
                'hour_start_time_thursday' => '08:00:00', 'hour_end_time_thursday' => '08:30:00',
                'hour_start_time_friday' => '08:00:00', 'hour_end_time_friday' => '08:30:00',
                'hour_start_time_saturday' => NULL, 'hour_end_time_saturday' => NULL,
                'hour_start_time_sunday' => NULL, 'hour_end_time_sunday' => NULL,
                'hour_description' => 'horario 1', 'status_id' => 1
            ],

            [
                'hour_monday' => 1, 'hour_tuesday' => 0, 'hour_wednesday' => 0, 'hour_thursday' => 1, 'hour_friday' => 1, 'hour_saturday' => 1, 'hour_sunday' => 0,
                'hour_start_time_monday' => '08:00:00', 'hour_end_time_monday' => '08:30:00',
                'hour_start_time_tuesday' => NULL, 'hour_end_time_tuesday' => NULL,
                'hour_start_time_wednesday' => NULL, 'hour_end_time_wednesday' => NULL,
                'hour_start_time_thursday' => '08:00:00', 'hour_end_time_thursday' => '08:30:00',
                'hour_start_time_friday' => '08:00:00', 'hour_end_time_friday' => '08:30:00',
                'hour_start_time_saturday' => '08:00:00', 'hour_end_time_saturday' => '08:30:00',
                'hour_start_time_sunday' => NULL, 'hour_end_time_sunday' => NULL,
                'hour_description' => 'horario 2', 'status_id' => 1
            ],

            [
                'hour_monday' => 0, 'hour_tuesday' => 0, 'hour_wednesday' => 1, 'hour_thursday' => 1, 'hour_friday' => 1, 'hour_saturday' => 1, 'hour_sunday' => 1,
                'hour_start_time_monday' => NULL, 'hour_end_time_monday' => NULL,
                'hour_start_time_tuesday' => NULL, 'hour_end_time_tuesday' => NULL,
                'hour_start_time_wednesday' => '08:00:00', 'hour_end_time_wednesday' => '08:30:00',
                'hour_start_time_thursday' => '08:00:00', 'hour_end_time_thursday' => '08:30:00',
                'hour_start_time_friday' => '08:00:00', 'hour_end_time_friday' => '08:30:00',
                'hour_start_time_saturday' => '08:00:00', 'hour_end_time_saturday' => '08:30:00',
                'hour_start_time_sunday' => '08:00:00', 'hour_end_time_sunday' => '08:30:00',
                'hour_description' => 'horario 3', 'status_id' => 1
            ],
        ]);

        DB::connection('tenant')->table('subject_curriculum')->insert([
            ['mesh_id' => 1, 'matter_id' => 1,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Matemática básica', 'group' => 1, 'order' => 1, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 2,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Lenguaje y comunicación', 'group' => 1, 'order' => 2, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 3,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Historia del Ecuador', 'group' => 1, 'order' => 3, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 4,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Cálculo diferencial integral 1', 'group' => 1, 'order' => 4, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 5,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Cálculo diferencial integral 2', 'group' => 1, 'order' => 5, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 6,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Cálculo diferencial integral 3', 'group' => 1, 'order' => 6, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 7,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Constitucional General', 'group' => 2, 'order' => 7, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 8,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Civil de Personas', 'group' => 2, 'order' => 8, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 9,  'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Penal I', 'group' => 2, 'order' => 9, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 10, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Teoría General del Proceso', 'group' => 2, 'order' => 10, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 11, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Ética y Emprendimiento', 'group' => 2, 'order' => 11, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 12, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Sociología Criminal', 'group' => 2, 'order' => 12, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 13, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Administrativo', 'group' => 3, 'order' => 13, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 14, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Civil Bienes I', 'group' => 3, 'order' => 14, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 15, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho de Familia', 'group' => 3, 'order' => 15, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 16, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Penal II', 'group' => 3, 'order' => 16, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 17, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Internacional Público', 'group' => 3, 'order' => 17, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 18, 'simbology_id' => 1, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Metodología de Investigación', 'group' => 3, 'order' => 18, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 19, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Procesal Constitucional', 'group' => 4, 'order' => 19, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 20, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Civil Bienes II', 'group' => 4, 'order' => 20, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 21, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Procedimiento Penal', 'group' => 4, 'order' => 21, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 22, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Teoría General de los Actos Jurídicos', 'group' => 4, 'order' => 22, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 23, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Municipal y Gobiernos Locales', 'group' => 4, 'order' => 23, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 24, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Ambiental', 'group' => 4, 'order' => 24, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 25, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derechos de las Obligaciones', 'group' => 5, 'order' => 25, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 26, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Procedimiento Civil I', 'group' => 5, 'order' => 26, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 27, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Mercantil', 'group' => 5, 'order' => 27, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 28, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Métodos Alternos de Solución de Conflictos', 'group' => 5, 'order' => 28, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 29, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Asignatura I del Itinerario', 'group' => 5, 'order' => 29, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 30, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho de Contratos I', 'group' => 6, 'order' => 30, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 31, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Procedimiento Civil II', 'group' => 6, 'order' => 31, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 32, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Societario', 'group' => 6, 'order' => 32, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 33, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Propiedad Intelectual', 'group' => 6, 'order' => 33, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 34, 'simbology_id' => 2, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Asignatura II del Itinerario', 'group' => 6, 'order' => 34, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 35, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho de Contratos II', 'group' => 7, 'order' => 35, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 36, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Tributario', 'group' => 7, 'order' => 36, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 37, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Sucesiones', 'group' => 7, 'order' => 37, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 38, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho del Trabajo', 'group' => 7, 'order' => 38, 'status_id' => 1],

            ['mesh_id' => 1, 'matter_id' => 39, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Práctica Civil', 'group' => 8, 'order' => 39, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 40, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Proyecto Integrador', 'group' => 8, 'order' => 40, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 41, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho Internacional Privado', 'group' => 8, 'order' => 41, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 42, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Derecho de Recursos no Renovables', 'group' => 8, 'order' => 42, 'status_id' => 1],
            ['mesh_id' => 1, 'matter_id' => 43, 'simbology_id' => 3, 'can_homologate' => 1, 'min_note' => 8, 'min_calification' => 7, 'max_calification' => 9, 'num_fouls' => 3, 'matter_rename' => 'Asignatura II del Itinerario', 'group' => 8, 'order' => 43, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('subject_curriculum_dependencies')->insert([
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


        /**
         * Creación de cursos
         */
        DB::connection('tenant')->table('courses')->insert([
            [
                'max_capacity'      => 25,
                'matter_id'         => 5,
                'parallel_id'       => 1,
                'classroom_id'      => 1,
                'modality_id'       => 71,
                'hourhand_id'       => 1,
                'collaborator_id'   => 1,
                'curriculum_id'     => 1,
                'period_id'         => 1,
                'status_id'         => 1,
            ],
            [
                'max_capacity'      => 30,
                'matter_id'         => 6,
                'parallel_id'       => 2,
                'classroom_id'      => 2,
                'modality_id'       => 71,
                'hourhand_id'       => 2,
                'collaborator_id'   => 1,
                'curriculum_id'     => 1,
                'period_id'         => 1,
                'status_id'         => 1,
            ],
        ]);

        DB::connection('tenant')->table('collaborator_education_levels')->insert([
            [
                'collaborator_id'       => 1,
                'education_level_id'    => 1,
                'status_id'             => 1
            ]
        ]);

        /**
         * Componentes de aprendizaje
         */
        DB::connection('tenant')->table('components')->insert([
            [
                'com_acronym'       => 'ACD',
                'com_name'          => 'Aprendizaje en contacto con el docente',
                'status_id'             => 1
            ],
            [
                'com_acronym'       => 'APE',
                'com_name'          => 'Aprendizaje Práctico - Experimental',
                'status_id'             => 1
            ],
            [
                'com_acronym'       => 'AA',
                'com_name'          => 'Aprendizaje Autónomo',
                'status_id'             => 1
            ],
            [
                'com_acronym'       => 'PP',
                'com_name'          => 'Prácticas preprofesionales',
                'status_id'             => 1
            ],
            [
                'com_acronym'       => 'VS',
                'com_name'          => 'Vinculación con la sociedad',
                'status_id'             => 1
            ],
        ]);

        DB::connection('tenant')->table('learning_components')->insert([
            [
                'mesh_id'               => 1,
                'component_id'          => 1,
                'lea_workload'          => 0,
                'status_id'             => 1
            ],
            [
                'mesh_id'               => 1,
                'component_id'          => 2,
                'lea_workload'          => 0,
                'status_id'             => 1
            ],
            [
                'mesh_id'               => 1,
                'component_id'          => 3,
                'lea_workload'          => 0,
                'status_id'             => 1
            ],
            [
                'mesh_id'               => 1,
                'component_id'          => 4,
                'lea_workload'          => 0,
                'status_id'             => 1
            ],
            [
                'mesh_id'               => 1,
                'component_id'          => 5,
                'lea_workload'          => 0,
                'status_id'             => 1
            ],
        ]);

        DB::connection('tenant')->table('type_applications')->insert([
            ['typ_app_name' => 'Academicas', 'typ_app_description' => 'Solicitudes Academicas', 'typ_app_acronym' => 'ACAD', 'parent_id' => null, 'status_id' => 1],
            ['typ_app_name' => 'Practicas Pre-profesionales', 'typ_app_description' => 'Solicitudes de practicas', 'typ_app_acronym' => 'PRACTP', 'parent_id' => null, 'status_id' => 1],
            ['typ_app_name' => 'Cambio Carrera', 'typ_app_description' => 'Solicitudes de cambio de carrera o facultad', 'typ_app_acronym' => 'CAMCAR', 'parent_id' => 1, 'status_id' => 1],
            ['typ_app_name' => 'Homologacion externa', 'typ_app_description' => 'Solicitudes de homologacion externa', 'typ_app_acronym' => 'HOMEXT', 'parent_id' => 1, 'status_id' => 1],
            ['typ_app_name' => 'Ingreso de Practica Pre-profesional', 'typ_app_description' => 'Solicitudes de ingreso a practicas', 'typ_app_acronym' => 'INGPRA', 'parent_id' => 2, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('config_type_applications')->insert([
            ['conf_typ_description' => 'Cambio de Carrera - json', 'conf_typ_data_type' => 'json', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => NULL, 'conf_typ_file_path' => NULL, 'type_application_id' => 3, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - id institucion proveniente', 'conf_typ_data_type' => 'integer', 'conf_typ_object_name' => 'App\Models\Institute', 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 4, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - id malla destino', 'conf_typ_data_type' => 'integer', 'conf_typ_object_name' => 'App\Models\Curriculum', 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 4, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - id persona', 'conf_typ_data_type' => 'integer', 'conf_typ_object_name' => 'App\Models\Person', 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 4, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - json', 'conf_typ_data_type' => 'json', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => NULL, 'conf_typ_file_path' => NULL, 'type_application_id' => 4, 'status_id' => 1],
        ]);

        /* DB::connection('tenant')->table('applications')->insert([
            ['app_code' => 'CAMCAR-0000001', 'app_description' => 'Solicitud de cambio de carrera ejemplo', 'app_register_date' => '2021-10-11', 'user_id' => 1, 'type_application_id' => 3, 'status_id' => 1],
            ['app_code' => 'HOMEXT-0000002', 'app_description' => 'Solicitud de homologacion externa ejemplo', 'app_register_date' => '2021-10-11', 'user_id' => 1, 'type_application_id' => 4, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('application_details')->insert([
            ['value' => 1, 'application_id' => 1, 'config_type_application_id' => 1],
            ['value' => 1, 'application_id' => 2, 'config_type_application_id' => 2],
            ['value' => 1, 'application_id' => 2, 'config_type_application_id' => 3],
            ['value' => 1, 'application_id' => 2, 'config_type_application_id' => 4],
        ]); */

        DB::connection('tenant')->table('type_application_status')->insert([
            ['order' => 0, 'type_application_id' => 3, 'status_id' => 10],  //Rechazado
            ['order' => 1, 'type_application_id' => 3, 'status_id' => 11],  //Enviado
            ['order' => 2, 'type_application_id' => 3, 'status_id' => 13],  //Aceptado
            ['order' => 0, 'type_application_id' => 4, 'status_id' => 10],  //Rechazado
            ['order' => 1, 'type_application_id' => 4, 'status_id' => 11],  //Enviado
            ['order' => 2, 'type_application_id' => 4, 'status_id' => 15],  //Finalizado
        ]);

        DB::connection('tenant')->table('type_application_status_roles')->insert([
            ['role_id' => 1, 'type_application_status_id' => 1],
            ['role_id' => 1, 'type_application_status_id' => 2],
            ['role_id' => 1, 'type_application_status_id' => 3],
            ['role_id' => 1, 'type_application_status_id' => 4],
            ['role_id' => 1, 'type_application_status_id' => 5],
            ['role_id' => 1, 'type_application_status_id' => 6],
            ['role_id' => 19, 'type_application_status_id' => 4],
            ['role_id' => 19, 'type_application_status_id' => 5],
            ['role_id' => 19, 'type_application_status_id' => 6],
        ]);

        /* DB::connection('tenant')->table('transac_type_application_status_roles')->insert([
            ['transac_secuencial' => 'CAMCAR-0000001', 'transac_register_date' => date('m-d-Y h:i:s a', time()), 'transac_comments' => 'Nueva solicitud cambio de carrera', 'user' => 'phoppe', 'type_application_status_roles_id' => 2, 'status_id' => 1],
            ['transac_secuencial' => 'HOMEXT-0000002', 'transac_register_date' => date('m-d-Y h:i:s a', time()), 'transac_comments' => 'Nueva solicitud homologacion externa', 'user' => 'phoppe', 'type_application_status_roles_id' => 5, 'status_id' => 1],
        ]); */
    }
}
