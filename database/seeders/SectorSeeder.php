<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Sector::insert([
            [
                'sec_name' => 'Ximena',
                'status_id' => 1,
            ], [
                'sec_name' => 'Los Esteros',
                'status_id' => 1,
            ], [
                'sec_name' => 'Febres Cordero',
                'status_id' => 1,
            ], [
                'sec_name' => 'Las Peñas',
                'status_id' => 1,
            ], [
                'sec_name' => 'Centenario',
                'status_id' => 1,
            ], [
                'sec_name' => 'Urdesa',
                'status_id' => 1,
            ]
        ]);
    }
}
