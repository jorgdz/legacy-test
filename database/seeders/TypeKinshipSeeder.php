<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeKinshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_kinship')->insert([
            ['typ_kin_name' => 'Mama',          'typ_kin_description' => 'Parentesco Mama',         'status_id' => 1],
            ['typ_kin_name' => 'Papa',          'typ_kin_description' => 'Parentesco Papa',         'status_id' => 1],
            ['typ_kin_name' => 'Hermano (a)',   'typ_kin_description' => 'Parentesco Hermano (a)',  'status_id' => 1],
            ['typ_kin_name' => 'Tio (a)',       'typ_kin_description' => 'Tio (a)',                 'status_id' => 1],
            ['typ_kin_name' => 'Abuelo (a)',    'typ_kin_description' => 'Abuelo (a)',              'status_id' => 1],
            ['typ_kin_name' => 'Primo (a)',     'typ_kin_description' => 'Primo (a)',               'status_id' => 1],
        ]);
    }
}
