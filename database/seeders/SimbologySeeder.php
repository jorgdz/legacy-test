<?php

namespace Database\Seeders;

use App\Models\Simbology;
use Illuminate\Database\Seeder;

class SimbologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Simbology::insert([
            [
                'status_id' => 1, 'sim_color' => '#1951a0', 'sim_description' => 'Básica'
            ],
            [
                'status_id' => 1, 'sim_color' => '#2db1e2', 'sim_description' => 'Profesional'
            ],
            [
                'status_id' => 1, 'sim_color' => '#5d7f9a', 'sim_description' => 'Titulación'
            ]
        ]);
    }
}
