<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('directories')->insert([
            ['di_name' => 'Directorio 1', 'di_type_directory' => 'Principal', 'di_route' => '', 'di_icon' => 'icon1', 'di_order' => 1, 'module_id' => 1, 'status_id' => 1],
            ['di_name' => 'Directorio 2', 'di_type_directory' => 'Principal', 'di_route' => '', 'di_icon' => 'icon2', 'di_order' => 2, 'module_id' => 1, 'status_id' => 1],
            ['di_name' => 'Directorio 3', 'di_type_directory' => 'Principal', 'di_route' => '', 'di_icon' => 'icon3', 'di_order' => 3, 'module_id' => 2, 'status_id' => 1],
        ]);
    }
}
