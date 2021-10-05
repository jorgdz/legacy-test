<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DeparmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert([
            [
                'dep_name' => 'Administracion',
                'dep_description' => 'Departamento de adminitracion del sistema',
                //'parent_id' => '',
                'status_id' => 1,
            ],
            [
                'dep_name' => 'Sistemas',
                'dep_description' => 'Departamento de adminitracion del sistema',
                //'parent_id' => '',
                'status_id' => 1,
            ],
            [
                'dep_name' => 'Academico',
                'pos_description' => 'Departamento academico-docentes',
                 //'parent_id' => '',
                'status_id' => 1,
            ],
        ]);
    }
}
