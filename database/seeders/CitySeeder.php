<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('cities')->insert([
            ['cit_name' => 'Guayaquil',     'cit_acronym' => 'Gye',     'cit_parent_city' => 'Guayaquil',   'status_id' => 1],
            ['cit_name' => 'Samborondon',   'cit_acronym' => 'Sambo',   'cit_parent_city' => 'Samborondon', 'status_id' => 1],
            ['cit_name' => 'Cuenca',        'cit_acronym' => 'Cuen',    'cit_parent_city' => 'Cuenca',      'status_id' => 1],
            ['cit_name' => 'Quito',         'cit_acronym' => 'DMQ',     'cit_parent_city' => 'Quito',       'status_id' => 1],
            ['cit_name' => 'Babahoyo',      'cit_acronym' => 'Bbhy',    'cit_parent_city' => 'Babahoyo',    'status_id' => 1],
        ]);
    }
}
