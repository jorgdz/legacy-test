<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('modules')->insert([
            ['mo_name' => 'Financiero', 'mo_description' => 'Modulo financiero', 'status_id' => 1],
            ['mo_name' => 'Facturación', 'mo_description' => 'Modulo de facturación', 'status_id' => 1],
        ]);
    }
}
