<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::insert([
            [
                'pos_name' => 'Administrador',
                'pos_description' => 'Es quien se encarga de administrar el sistema',
                'role_id' => 1,
                'status_id' => 1,
            ],
            [
                'pos_name' => 'Soporte',
                'pos_description' => 'Es quien se encarga de operar el sistema',
                'role_id' => 1,
                'status_id' => 1,
            ],
            [
                'pos_name' => 'Gerente',
                'pos_description' => 'Es quien representa la empresa',
                'role_id' => 2,
                'status_id' => 1,
            ],
            [
                'pos_name' => 'Tecnico',
                'pos_description' => 'Es quien se encarga de reparar algo',
                'role_id' => 2,
                'status_id' => 1,
            ],
        ]);
    }
}
