<?php

namespace Database\Seeders;

use App\Models\GroupArea;
use Illuminate\Database\Seeder;

class GroupAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GroupArea::insert([
            [
                'ga_name' => 'Ciencias empresariales a fines', 'ga_description' => NULL, 'status_id' => 1
            ],
            [
                'ga_name' => 'Ciencias sociales y a fines', 'ga_description' => NULL, 'status_id' => 1
            ],
            [
                'ga_name' => 'Ciencias de la salud y desarrollo humano', 'ga_description' => NULL, 'status_id' => 1
            ],
        ]);
    }
}
