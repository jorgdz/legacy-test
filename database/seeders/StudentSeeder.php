<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('students')->insert(
            ['stud_code' => '202106210001'
             ,'stud_photo' => 'algo'
             ,'stud_observation' => 'algo resumen'
             ,'status_id' => 1
             ,'campus_id' => 1
             ,'modalidad_id' => 1
             ,'user_id' => 1
             ,'jornada_id' => 1
            ],
            ['stud_code' => '202106210002'
             ,'stud_photo' => 'algo2'
             ,'stud_observation' => 'algo2 resumen'
             ,'status_id' => 1
             ,'campus_id' => 1
             ,'modalidad_id' => 1
             ,'user_id' => 1
             ,'jornada_id' => 1]
        );
    }
}
