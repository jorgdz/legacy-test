<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigTypeApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_applications')->insert([
            ['typ_app_name' => 'Academicas', 'typ_app_description' => 'Solicitudes Academicas', 'typ_app_acronym' => 'ACAD', 'parent_id' => null, 'status_id' => 1],
            ['typ_app_name' => 'Practicas Pre-profesionales', 'typ_app_description' => 'Solicitudes de practicas', 'typ_app_acronym' => 'PRACTP', 'parent_id' => null, 'status_id' => 1],
            ['typ_app_name' => 'Recursos Humanos', 'typ_app_description' => 'Solicitudes de recursos humanos', 'typ_app_acronym' => 'RRHH', 'parent_id' => null, 'status_id' => 1],
            ['typ_app_name' => 'Cambio Carrera', 'typ_app_description' => 'Solicitudes de cambio de carrera o facultad', 'typ_app_acronym' => 'CAMCAR', 'parent_id' => 1, 'status_id' => 1],
            ['typ_app_name' => 'Homologacion externa', 'typ_app_description' => 'Solicitudes de homologacion externa', 'typ_app_acronym' => 'HOMEXT', 'parent_id' => 1, 'status_id' => 1],
            ['typ_app_name' => 'Ingreso de Practica Pre-profesional', 'typ_app_description' => 'Solicitudes de ingreso a practicas', 'typ_app_acronym' => 'INGPRA', 'parent_id' => 2, 'status_id' => 1],
            ['typ_app_name' => 'Requisicion de personal docente', 'typ_app_description' => 'Solicitudes de requisicion de personal docente', 'typ_app_acronym' => 'REQDOC', 'parent_id' => 3, 'status_id' => 1],
        ]);
        
        DB::connection('tenant')->table('config_type_applications')->insert([
            ['conf_typ_description' => 'Cambio de Carrera - json studentRecord', 'conf_typ_data_type' => 'json', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => NULL, 'conf_typ_file_path' => NULL, 'type_application_id' => 4, 'status_id' => 1],
            ['conf_typ_description' => 'Cambio de Carrera - json approvedSubjects', 'conf_typ_data_type' => 'json', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => NULL, 'conf_typ_file_path' => NULL, 'type_application_id' => 4, 'status_id' => 1],
            ['conf_typ_description' => 'Cambio de Carrera - json subjectsOfNewApplicationLevel', 'conf_typ_data_type' => 'json', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => NULL, 'conf_typ_file_path' => NULL, 'type_application_id' => 4, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - id institucion proveniente', 'conf_typ_data_type' => 'integer', 'conf_typ_object_name' => 'App\Models\Institute', 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 5, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - id malla destino', 'conf_typ_data_type' => 'integer', 'conf_typ_object_name' => 'App\Models\Curriculum', 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 5, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - id persona', 'conf_typ_data_type' => 'integer', 'conf_typ_object_name' => 'App\Models\Person', 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 5, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - json', 'conf_typ_data_type' => 'json', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => NULL, 'conf_typ_file_path' => NULL, 'type_application_id' => 5, 'status_id' => 1],
            ['conf_typ_description' => 'Homologacion externa - correo electronico', 'conf_typ_data_type' => 'string', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => 'email', 'conf_typ_file_path' => NULL, 'type_application_id' => 5, 'status_id' => 1],
            ['conf_typ_description' => 'Requesisicion de personal docente - user_id', 'conf_typ_data_type' => 'integer', 'conf_typ_object_name' => 'App\Models\User', 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 7, 'status_id' => 1],
            ['conf_typ_description' => 'Requesisicion de personal docente - Json Data (user_id_requisition, coll_email, offer_id, hourhand_id, period_id, education_level_id))', 'conf_typ_data_type' => 'Json', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 7, 'status_id' => 1],
            ['conf_typ_description' => 'Requesisicion de personal docente - Json Data (tipo_vinculacion, tipo_dedicacion)', 'conf_typ_data_type' => 'Json', 'conf_typ_object_name' => NULL, 'conf_typ_object_id' => 'id', 'conf_typ_file_path' => NULL, 'type_application_id' => 7, 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('type_application_status')->insert([
            ['order' => 0, 'type_application_id' => 4, 'status_id' => 14],  //Rechazado
            ['order' => 1, 'type_application_id' => 4, 'status_id' => 15],  //Enviado
            ['order' => 2, 'type_application_id' => 4, 'status_id' => 17],  //Aceptado
            ['order' => 0, 'type_application_id' => 5, 'status_id' => 14],  //Rechazado
            ['order' => 1, 'type_application_id' => 5, 'status_id' => 15],  //Enviado
            ['order' => 2, 'type_application_id' => 5, 'status_id' => 19],  //Finalizado
            ['order' => 0, 'type_application_id' => 7, 'status_id' => 14],  //Rechazado
            ['order' => 1, 'type_application_id' => 7, 'status_id' => 15],  //Enviado
            ['order' => 2, 'type_application_id' => 7, 'status_id' => 16],  //Revisado
            ['order' => 3, 'type_application_id' => 7, 'status_id' => 18],  //Aprobado
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
            ['role_id' => 1, 'type_application_status_id' => 7],
            ['role_id' => 1, 'type_application_status_id' => 8],
            ['role_id' => 1, 'type_application_status_id' => 9],
            ['role_id' => 1, 'type_application_status_id' => 10],
            ['role_id' => 16, 'type_application_status_id' => 7],
            ['role_id' => 16, 'type_application_status_id' => 9],
            ['role_id' => 4, 'type_application_status_id' => 7],
            ['role_id' => 4, 'type_application_status_id' => 10],
        ]);
    }
}
