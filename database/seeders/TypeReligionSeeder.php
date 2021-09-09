<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_religions')->insert([
            ['typ_rel_name' => 'Cristiano',     'typ_rel_description' => 'Cristanismo',         'status_id' => 1],
            ['typ_rel_name' => 'Catolico',      'typ_rel_description' => 'Catolicismo',         'status_id' => 1],
            ['typ_rel_name' => 'Islam',         'typ_rel_description' => 'Islam',               'status_id' => 1],
            ['typ_rel_name' => 'Hinduismo',     'typ_rel_description' => 'Hinduismo',           'status_id' => 1],
            ['typ_rel_name' => 'Budismo',       'typ_rel_description' => 'Budismo',             'status_id' => 1],
            ['typ_rel_name' => 'Judaismo',      'typ_rel_description' => 'Judaismo',            'status_id' => 1],
            ['typ_rel_name' => 'Agnostico',     'typ_rel_description' => 'Agnostico',           'status_id' => 1],
            ['typ_rel_name' => 'Ateo',          'typ_rel_description' => 'Ateo',                'status_id' => 1],
            ['typ_rel_name' => 'Otros',         'typ_rel_description' => 'Otras religiones',    'status_id' => 1],
        ]);
    }
}
