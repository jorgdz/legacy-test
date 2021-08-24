<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeIdentification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_identifications')->insert([
            ['ti_name' => 'Cédula'],
            ['ti_name' => 'RUC'],
            ['ti_name' => 'DNI'],
            ['ti_name' => 'Pasaporte'],
        ]);
    }
}
