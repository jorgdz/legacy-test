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
            ['tin_name' => 'Institutos', 'ti_keyword' => 'educacion-institutos', 'status_id' => 1],
            ['tin_name' => 'Tecnológicos', 'ti_keyword' => 'educacion-tecnologicos', 'status_id' => 1],
            ['tin_name' => 'Universidad', 'ti_keyword' => 'educacion-universitaria', 'status_id' => 1],
        ]);
    }
}
