<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('campus')->insert(
          

            [
                'cam_name' => 'Samborondón',
                'cam_description' => 'Samborondón',
                'cam_direction' => 'Vía Samborondón Km. 13.5',
                'cam_initials' => 'samb',
                'status_id' => 1
            ],
            [
                'cam_name' => 'Juan Tanca Marengo',
                'cam_description' => 'Juan Tanca Marengo',
                'cam_direction' => 'Av. Juan Tanca Marengo Km. 2',
                'cam_initials' => 'jtma',
                'status_id' => 1
            ],
            [
                'cam_name' => 'La Costa',
                'cam_description' => 'La Costa',
                'cam_direction' => ' Km 16.5 Vía La Costa',
                'cam_initials' => 'cost',
                'status_id' => 1
            ]
        );
    }
}
