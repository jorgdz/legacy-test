<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('profiles')->insert([
            ['pro_name' => 'Sistemas', 'status_id' => 1],
            ['pro_name' => 'Colaborador', 'status_id' => 1],
            ['pro_name' => 'Estudiante', 'status_id' => 1],
            ['pro_name' => 'Representante', 'status_id' => 1],
        ]);
    }
}
