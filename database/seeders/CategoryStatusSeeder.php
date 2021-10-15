<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('category_status')->insert([
            ['cat_name' => 'Generales',     'cat_description' => 'Estados generales'],
            ['cat_name' => 'Desarrollo',    'cat_description' => 'Estados en desarrollo'],
            ['cat_name' => 'Planificacion', 'cat_description' => 'Estados en planificacion'],
            ['cat_name' => 'Materias',      'cat_description' => 'Estados en materias'],
            ['cat_name' => 'Mallas',        'cat_description' => 'Estados en mallas'],
            ['cat_name' => 'Documentos',    'cat_description' => 'Estados en documentos'],
        ]);
    }
}
