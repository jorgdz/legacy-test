<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('status')->insert([
            ['st_name' => 'Activo'],
            ['st_name' => 'Inactivo'],
            ['st_name' => 'Eliminado']
        ]);
    }
}
