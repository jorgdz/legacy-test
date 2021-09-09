<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeInstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_institutes')->insert([
            ['tin_name' => 'Ecotec',        'status_id' => 1],
            ['tin_name' => 'Ecomundo',      'status_id' => 1],
            ['tin_name' => 'Uni. Estatal',  'status_id' => 1],
            ['tin_name' => 'Espol',         'status_id' => 1],
        ]);
    }
}
