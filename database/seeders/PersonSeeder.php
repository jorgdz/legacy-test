<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::connection('tenant')->table('persons')->insert([
            [
                'pers_identification' => '0999999999',
                'pers_firstname' => 'Dante',
                'pers_secondname' => 'Emmanuel',
                'pers_first_lastname' => 'Ortiz',
                'pers_second_lastname' => 'Ramirez',
                'pers_gender' => 'Masculino',
                'pers_date_birth' => '1995-07-21',
                'pers_direction' => 'Localhost',
                'pers_phone_home' => '4273783',
                'pers_cell' => 'Doctor',
                'pers_num_child' => 1,
                'pers_profession' => 'N/A',
                'pers_num_bedrooms' => 4,
                'pers_study_reason' => 'Crear nuevas formas de generar ingreso',
                'pers_num_taxpayers_household' => 4,
                'pers_has_vehicle' => 1,
                'pers_has_disability' => 0,
                'vivienda_id' => 16,
                'type_religion_id' => 35,
                'status_marital_id' => 45,
                'nationality_id' => 88,
                'city_id' => 49,
                'current_city_id' => 49,
                'sector_id' => 54,
                'ethnic_id' => 60,
                'nationality_id' => 49,
                'type_identification_id' => 67,
            ], [
                'pers_identification' => '0888888888',
                'pers_firstname' => 'Donella',
                'pers_secondname' => 'Theodora',
                'pers_first_lastname' => 'Bravo',
                'pers_second_lastname' => 'Mendoza',
                'pers_gender' => 'Femenino',
                'pers_date_birth' => '1993-09-14',
                'pers_direction' => 'Localhost',
                'pers_phone_home' => '4273783',
                'pers_cell' => 'Doctor',
                'pers_num_child' => 1,
                'pers_profession' => 'N/A',
                'pers_num_bedrooms' => 4,
                'pers_study_reason' => 'Crear nuevas formas de generar ingreso',
                'pers_num_taxpayers_household' => 4,
                'pers_has_vehicle' => 1,
                'pers_has_disability' => 0,
                'vivienda_id' => 17,
                'type_religion_id' => 36,
                'status_marital_id' => 46,
                'nationality_id' => 89,
                'city_id' => 50,
                'current_city_id' => 50,
                'sector_id' => 55,
                'ethnic_id' => 61,
                'nationality_id' => 49,
                'type_identification_id' => 67,
            ]
        ]);
    }
}
