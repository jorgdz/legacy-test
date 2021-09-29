<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // No cambiar el orden de los estado. Si se tiene que agregar nuevos estados, se los ubicará al final.
        DB::connection('tenant')->table('status')->insert([
            ['st_name' => 'Activo', 'category_status_id' => '1'],
            ['st_name' => 'Inactivo', 'category_status_id' => '1'],
            ['st_name' => 'Eliminado', 'category_status_id' => '1'],
            ['st_name' => 'Ingreso', 'category_status_id' => '4'],
            ['st_name' => 'Vigente', 'category_status_id' => '4'],
            ['st_name' => 'No vigente', 'category_status_id' => '4'],
            ['st_name' => 'Vigente', 'category_status_id' => '5'],
            ['st_name' => 'No vigente', 'category_status_id' => '5'],
            ['st_name' => 'En espera', 'category_status_id' => '5'],
        ]);
    }
}
