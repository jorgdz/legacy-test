<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('mentions')->insert([
            ['ment_name' => 'Mejor alumno', 'ment_description' => 'Mención a mejor alumno', 'ment_acronym' => '', 'status_id' => 1],
            ['ment_name' => 'Atleta olímpico', 'ment_description' => 'Mejor atleta olímpico', 'ment_acronym' => '', 'status_id' => 1],
        ]);
    }
}
