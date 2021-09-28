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
            ['cat_name' => 'Viviendas', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'VV', 'status_id' => 1],
            ['cat_name' => 'Tipo de viviendas', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'TV', 'status_id' => 1],
            ['cat_name' => 'Redes sociales', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'RS', 'status_id' => 1],
            ['cat_name' => 'Servicios basicos', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'SB', 'status_id' => 1],
            ['cat_name' => 'Generos', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'G', 'status_id' => 1],
            ['cat_name' => 'Estado Civil', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'SM', 'status_id' => 1],
            ['cat_name' => 'Religion', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'TR', 'status_id' => 1],
            ['cat_name' => 'Ciudad', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'C', 'status_id' => 1],
            ['cat_name' => 'Sector', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'S', 'status_id' => 1],
            ['cat_name' => 'Etnia', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'ET', 'status_id' => 1],
            ['cat_name' => 'Tipo de Identificacion', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'TI', 'status_id' => 1],
            ['cat_name' => 'Modalidad', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'M', 'status_id' => 1],
            ['cat_name' => 'Jornada', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'J', 'status_id' => 1],
            ['cat_name' => 'Parentesco', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'P', 'status_id' => 1],
            ['cat_name' => 'Idiomas', 'parent_id' => NULL, 'cat_description' => NULL, 'cat_acronym' => 'I', 'status_id' => 1],

            ['cat_name' => 'Casa', 'parent_id' => 1, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Apartamento', 'parent_id' => 1, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Edificio', 'parent_id' => 1, 'cat_description' => NULL, 'cat_acronym' => NULL,'status_id' => 1],
            ['cat_name' => 'Masion', 'parent_id' => 1, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Madera', 'parent_id' => 2, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Ladrillo', 'parent_id' => 2, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Hormigon', 'parent_id' => 2, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Acero', 'parent_id' => 2, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Mixtas', 'parent_id' => 2, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Facebook', 'parent_id' => 3, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'WhatsApp', 'parent_id' => 3, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Instagram', 'parent_id' => 3, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Twitter', 'parent_id' => 3, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'LinkedIn', 'parent_id' => 3, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Agua', 'parent_id' => 4, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Luz', 'parent_id' => 4, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Telefono', 'parent_id' => 4, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Masculino', 'parent_id' => 5, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Femenino', 'parent_id' => 5, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Casado/a', 'parent_id' => 6, 'cat_description' => 'Persona en matrimonio', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Soltero/a', 'parent_id' => 6, 'cat_description' => 'Persona soltera', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Viudo/a', 'parent_id' => 6, 'cat_description' => 'Persona viuda', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Divorciado/a', 'parent_id' => 6, 'cat_description' => 'Persona divorciada', 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Cristiano', 'parent_id' => 7, 'cat_description' => 'Cristanismo', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Catolico', 'parent_id' => 7, 'cat_description' => 'Catolicismo', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Islam', 'parent_id' => 7, 'cat_description' => 'Islam','cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Hinduismo', 'parent_id' => 7, 'cat_description' => 'Hinduismo', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Budismo', 'parent_id' => 7, 'cat_description' => 'Budismo', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Judaismo', 'parent_id' => 7, 'cat_description' => 'Judaismo', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Agnostico', 'parent_id' => 7, 'cat_description' => 'Agnostico','cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Ateo', 'parent_id' => 7, 'cat_description' => 'Ateo', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Otros', 'parent_id' => 7, 'cat_description' => 'Otras religiones', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Ninguno', 'parent_id' => 7, 'cat_description' => 'Ninguno', 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Guayaquil', 'parent_id' => 8, 'cat_description' => NULL, 'cat_acronym' => 'Gye', 'status_id' => 1],
            ['cat_name' => 'Samborondon', 'parent_id' => 8, 'cat_description' => NULL, 'cat_acronym' => 'Samb', 'status_id' => 1],
            ['cat_name' => 'Cuenca', 'parent_id' => 8, 'cat_description' => NULL, 'cat_acronym' => 'Cuen', 'status_id' => 1],
            ['cat_name' => 'Quito', 'parent_id' => 8, 'cat_description' => NULL, 'cat_acronym' => 'DMQ', 'status_id' => 1],
            ['cat_name' => 'Babahoyo', 'parent_id' => 8, 'cat_description' => NULL, 'cat_acronym' => 'Bbhy', 'status_id' => 1],

            ['cat_name' => 'Ximena', 'parent_id' => 9, 'cat_description' => NULL, 'cat_acronym' => NULL,  'status_id' => 1],
            ['cat_name' => 'Los Esteros', 'parent_id' => 9, 'cat_description' => NULL, 'cat_acronym' => NULL,  'status_id' => 1,],
            ['cat_name' => 'Febres Cordero', 'parent_id' => 9, 'cat_description' => NULL, 'cat_acronym' => NULL,  'status_id' => 1],
            ['cat_name' => 'Las Peñas', 'parent_id' => 9, 'cat_description' => NULL, 'cat_acronym' => NULL,  'status_id' => 1],
            ['cat_name' => 'Centenario', 'parent_id' => 9, 'cat_description' => NULL, 'cat_acronym' => NULL,  'status_id' => 1],
            ['cat_name' => 'Urdesa', 'parent_id' => 9, 'cat_description' => NULL, 'cat_acronym' => NULL,  'status_id' => 1],

            ['cat_name' => 'Mestizo', 'parent_id' => 10, 'cat_description' => 'Mestizo', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Montubio', 'parent_id' => 10, 'cat_description' => 'Montubio', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Afroecuatoriano', 'parent_id' => 10, 'cat_description' => 'Afroecuatoriano', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Indigena', 'parent_id' => 10, 'cat_description' => 'Indigena', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Blanco', 'parent_id' => 10, 'cat_description' => 'Blanco', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Asiatico', 'parent_id' => 10, 'cat_description' => 'Asiatico', 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Cédula', 'parent_id' => 11, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'RUC', 'parent_id' => 11, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'DNI', 'parent_id' => 11, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Pasaporte', 'parent_id' => 11, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Presencial', 'parent_id' => 12, 'cat_description' => NULL, 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Matutina', 'parent_id' => 13, 'cat_description' => 'En la mañana', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Vespertina', 'parent_id' => 13, 'cat_description' => 'En la tarde', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Nocturna', 'parent_id' => 13, 'cat_description' => 'En la noche', 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Mama', 'parent_id' => 14, 'cat_description' => 'Parentesco Mama', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Papa', 'parent_id' => 14, 'cat_description' => 'Parentesco Papa', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Hermano/a', 'parent_id' => 14, 'cat_description' => 'Parentesco Hermano/a', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Tio/a', 'parent_id' => 14, 'cat_description' => 'Tio/a', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Abuelo/a', 'parent_id' => 14, 'cat_description' => 'Abuelo/a', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Primo/a', 'parent_id' => 14, 'cat_description' => 'Primo/a', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Otro/a', 'parent_id' => 14, 'cat_description' => 'Otro/a', 'cat_acronym' => NULL, 'status_id' => 1],

            ['cat_name' => 'Español', 'parent_id' => 15, 'cat_description' => 'Habla idioma español', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Inglés', 'parent_id' => 15, 'cat_description' => 'Habla idioma inglés', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Francés', 'parent_id' => 15, 'cat_description' => 'Habla idioma francés', 'cat_acronym' => NULL, 'status_id' => 1],
            ['cat_name' => 'Chino', 'parent_id' => 15, 'cat_description' => 'Habla idioma chino mandarin', 'cat_acronym' => NULL, 'status_id' => 1],
        ]);
    }
}