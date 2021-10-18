<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprovalReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('approval_reasons')->insert([         
            ['ar_description' => 'Aprobado por Notas', 'status_id' =>1],
            ['ar_description' => 'Reprobado por Notas', 'status_id' =>1],
        ]);
    }
}
