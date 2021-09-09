<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('blood_type')->insert([
            ['blo_typ_name' => 'O negativo',  'blo_typ_description' => 'O negativo',     'status_id' => 1],
            ['blo_typ_name' => 'O positivo',  'blo_typ_description' => 'O positivo',     'status_id' => 1],
            ['blo_typ_name' => 'A negativo',  'blo_typ_description' => 'A negativo',     'status_id' => 1],
            ['blo_typ_name' => 'A positivo',  'blo_typ_description' => 'A positivo',     'status_id' => 1],
            ['blo_typ_name' => 'B negativo',  'blo_typ_description' => 'B negativo',     'status_id' => 1],
            ['blo_typ_name' => 'B positivo',  'blo_typ_description' => 'B positivo',     'status_id' => 1],
            ['blo_typ_name' => 'AB negativo', 'blo_typ_description' => 'AB negativo',    'status_id' => 1],
            ['blo_typ_name' => 'AB positivo', 'blo_typ_description' => 'AB positivo',    'status_id' => 1],
        ]);
    }
}
