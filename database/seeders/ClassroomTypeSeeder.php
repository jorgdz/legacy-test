<?php

namespace Database\Seeders;

use App\Models\ClassroomType;
use Illuminate\Database\Seeder;

class ClassroomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassroomType::insert([
            [
                'clt_name' => 'Pequeña',
                'clt_description' => 'Un aula pequeña',
                'status_id' => 1,
            ],
            [
                'clt_name' => 'Mediana',
                'clt_description' => 'Un aula mediana',
                'status_id' => 1,
            ],
            [
                'clt_name' => 'Grande',
                'clt_description' => 'Un aula grande',
                'status_id' => 1,
            ],
            [
                'clt_name' => 'Virtual',
                'clt_description' => 'Un aula virtual',
                'status_id' => 1,
            ],
        ]);
    }
}
