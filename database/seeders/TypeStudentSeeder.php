<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_students')->insert([
            ['te_name' => 'Homologante', 'te_description' => 'Homologante', 'status_id' => 1],
            ['te_name' => 'Visitante', 'te_description' => 'Visitante', 'status_id' => 1],
            ['te_name' => 'Retirado', 'te_description' => 'Retirado', 'status_id' => 1],
            ['te_name' => 'Inscrito', 'te_description' => 'Inscrito', 'status_id' => 1],
            ['te_name' => 'Internacional', 'te_description' => 'Internacional', 'status_id' => 1],
            ['te_name' => 'Estudiante de intercambio', 'te_description' => 'Estudiante de intercambio', 'status_id' => 1],
            ['te_name' => 'Regular', 'te_description' => 'Regular', 'status_id' => 1],
            ['te_name' => 'Sancionado', 'te_description' => 'Sancionado', 'status_id' => 1],
        ]);
    }
}
