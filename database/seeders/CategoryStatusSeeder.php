<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('category_status')->insert([
            ['cat_name' => 'Generales',         'cat_description' => 'estados generales'],
            ['cat_name' => 'Desarrollo',        'cat_description' => 'estados en desarrollo'],
            ['cat_name' => 'Planificacion',     'cat_description' => 'estados en planificacion'],
        ]);
    }
}
