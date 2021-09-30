<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('profiles')->insert([
           /*  ['pro_name' => 'General', 'status_id' => 1],
            ['pro_name' => 'Soporte', 'status_id' => 1],
            ['pro_name' => 'Colaborador', 'status_id' => 1], */
            ['pro_name' => 'Estudiante', 'keyword' => 'estudiante', 'pro_description' => 'Perfil de estudiante', 'status_id' => 1],
            ['pro_name' => 'Representante', 'keyword' => 'representante', 'pro_description' => 'Perfil de representante', 'status_id' => 1],
            ['pro_name' => 'Administrativo', 'keyword' => 'administrativo', 'pro_description' => 'Perfil administrativo', 'status_id' => 1],
            ['pro_name' => 'Docente', 'keyword' => 'docente', 'pro_description' => 'Perfil de docente', 'status_id' => 1],
        ]);
    }
}
