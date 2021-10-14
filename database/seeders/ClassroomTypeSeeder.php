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
                'clt_name' => 'Aula Magna',
                'clt_description' => 'Un aula Aula Magna',
                'status_id' => 1,
            ],
            [
                'clt_name' => 'Laboratorio de Computación',
                'clt_description' => 'Un aula Laboratorio de Computación',
                'status_id' => 1,
            ],
            [
                'clt_name' => 'Laboratorio de Química',
                'clt_description' => 'Un aula Laboratorio de Química',
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
