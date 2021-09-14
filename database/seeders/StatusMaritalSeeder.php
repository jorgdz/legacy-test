<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusMaritalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('status_marital')->insert([
            ['sta_mar_name' => 'Casado/a', 'sta_mar_description' => 'Persona en matrimonio', 'status_id' => 1],
            ['sta_mar_name' => 'Soltero/a', 'sta_mar_description' => 'Persona soltera', 'status_id' => 1],
            ['sta_mar_name' => 'Viudo/a', 'sta_mar_description' => 'Persona viuda', 'status_id' => 1],
            ['sta_mar_name' => 'Divorciado/a', 'sta_mar_description' => 'Persona divorciada', 'status_id' => 1],
            ['sta_mar_name' => 'Ninguno', 'sta_mar_description' => 'Ninguno', 'status_id' => 1],
        ]);
    }
}
