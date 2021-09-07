<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('ethnics')->insert([
            ['eth_name' => 'Mestizo',           'eth_description' => 'Mestizo', 'status_id' => 1],
            ['eth_name' => 'Montubio',          'eth_description' => 'Montubio', 'status_id' => 1],
            ['eth_name' => 'Afroecuatoriano',   'eth_description' => 'Afroecuatoriano', 'status_id' => 1],
            ['eth_name' => 'Indigena',          'eth_description' => 'Indigena', 'status_id' => 1],
            ['eth_name' => 'Blanco',            'eth_description' => 'Blanco', 'status_id' => 1],
            ['eth_name' => 'Asiatico',          'eth_description' => 'Asiatico', 'status_id' => 1],
        ]);
    }
}
