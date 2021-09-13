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
                'pers_firstname' => 'Dante',
                'pers_secondname' => 'Emmanuel',
                'pers_first_lastname' => 'Ortiz',
                'pers_second_lastname' => 'Ramirez',
                'pers_gender' => 'Masculino',
                'pers_date_birth' => '1995-07-21',
                'type_religion_id' => 1,
                'status_marital_id' => 2,
                'city_id' => 1,
                'current_city_id' => 1,
                'sector_id' => 1,
                'type_identification_id' => 1,
                'ethnic_id' => 1,
            ], [
                'pers_firstname' => 'Donella',
                'pers_secondname' => 'Theodora',
                'pers_first_lastname' => 'Bravo',
                'pers_second_lastname' => 'Mendoza',
                'pers_gender' => 'Femenino',
                'pers_date_birth' => '1993-09-14',
                'type_religion_id' => 9,
                'status_marital_id' => 1,
                'city_id' => 2,
                'current_city_id' => 2,
                'sector_id' => 2,
                'type_identification_id' => 1,
                'ethnic_id' => 1,
            ]
        ]);
    }
}
