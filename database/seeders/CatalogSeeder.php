<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('catalogs')->insert([
            ['cat_name' => 'Viviendas', 'parent_id' => NULL],
            ['cat_name' => 'Tipo de viviendas', 'parent_id' => NULL],
            ['cat_name' => 'Redes sociales', 'parent_id' => NULL],
            ['cat_name' => 'Servicios basicos', 'parent_id' => NULL],
            ['cat_name' => 'Generos', 'parent_id' => NULL],
            ['cat_name' => 'Casa', 'parent_id' => 1],
            ['cat_name' => 'Apartamento', 'parent_id' => 1],
            ['cat_name' => 'Edificio', 'parent_id' => 1],
            ['cat_name' => 'Masion', 'parent_id' => 1],
            ['cat_name' => 'Madera', 'parent_id' => 2],
            ['cat_name' => 'Ladrillo', 'parent_id' => 2],
            ['cat_name' => 'Hormigon', 'parent_id' => 2],
            ['cat_name' => 'Acero', 'parent_id' => 2],
            ['cat_name' => 'Mixtas', 'parent_id' => 2],
            ['cat_name' => 'Facebook', 'parent_id' => 3],
            ['cat_name' => 'WhatsApp', 'parent_id' => 3],
            ['cat_name' => 'Instagram', 'parent_id' => 3],
            ['cat_name' => 'Twitter', 'parent_id' => 3],
            ['cat_name' => 'LinkedIn', 'parent_id' => 3],
            ['cat_name' => 'Agua', 'parent_id' => 4],
            ['cat_name' => 'Luz', 'parent_id' => 4],
            ['cat_name' => 'Telefono', 'parent_id' => 4],
            ['cat_name' => 'Masculino', 'parent_id' => 5],
            ['cat_name' => 'Femenino', 'parent_id' => 5],
        ]);
    }
}
