<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('areas')->insert([
            ['ar_name' => 'No definido', 'ar_description' => NULL, 'status_id' => 1],
            ['ar_name' => 'Ciencias Sociales', 'ar_description' => NULL, 'status_id' => 1],
            ['ar_name' => 'Matematicas', 'ar_description' => NULL, 'status_id' => 1],
            ['ar_name' => 'Contabilidad', 'ar_description' => NULL, 'status_id' => 1],
        ]);
    }
}
