<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDaytripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('type_daytrip')->insert([
            ['typ_day_name' => 'Matutina', 'typ_day_description' => 'En la mañana', 'status_id' => 1],
            ['typ_day_name' => 'Vespertina', 'typ_day_description' => 'En la tarde', 'status_id' => 1],
            ['typ_day_name' => 'Nocturna', 'typ_day_description' => 'En la noche', 'status_id' => 1],
        ]);
    }
}
