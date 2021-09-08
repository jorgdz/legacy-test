<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('offers')->insert([
            ['off_name' => 'Grado',                 'off_description' => 'Oferta de Grado',                 'status_id' => 1],
            ['off_name' => 'Postgrado',             'off_description' => 'Oferta de Postgrado',             'status_id' => 1],
            ['off_name' => 'Educacion continua',    'off_description' => 'Oferta de Educacion continua',    'status_id' => 1],
            ['off_name' => 'Online',                'off_description' => 'Oferta Online',                   'status_id' => 1],
            ['off_name' => 'Educacion inicial',     'off_description' => 'Oferta de Educacion inicial',     'status_id' => 1],
            ['off_name' => 'Basica',                'off_description' => 'Oferta Basica',                   'status_id' => 1],
            ['off_name' => 'Educacion general',     'off_description' => 'Oferta Educacion general',        'status_id' => 1],
            ['off_name' => 'Bachillerato',          'off_description' => 'Oferta de Bachillerato',          'status_id' => 1],
        ]);
    }
}
