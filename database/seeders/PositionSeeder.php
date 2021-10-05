<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::insert([
            [
                'pos_name' => 'Administrador',
                'pos_description' => 'Es quien se encarga de administrar el sistema',
                'pos_keyword'=>'ADM',
                'role_id' => 1,
                'department_id'=>1,
                'status_id' => 1,
            ],
            [
                'pos_name' => 'Soporte',
                'pos_description' => 'Es quien se encarga de operar el sistema',
                'pos_keyword'=>'SPT',
                'role_id' => 2,
                'department_id'=>2,
                'status_id' => 1,
            ],
            [
                'pos_name' => 'Docente',
                'pos_description' => 'Es quien se encarga de las actividades extracurriculares y curriculares en el módulo académico',
                'pos_keyword'=>'DOCT',
                'role_id' => 17,
                'department_id'=>2,
                'status_id' => 1,
            ],
        ]);
    }
}
