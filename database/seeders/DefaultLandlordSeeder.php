<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultLandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('landlord')->table('type_documents')->insert([
            ['name' => 'AGENDA'],
            ['name' => 'MATERIALES'],
            ['name' => 'MENSAJES'],
            ['name' => 'ADMISIONES'],
            ['name' => 'CIRCULATE_EVENTO'],
            ['name' => 'LOGOS'],
            ['name' => 'FOTOS_ALUMNOS'],
        ]);
    }
}
