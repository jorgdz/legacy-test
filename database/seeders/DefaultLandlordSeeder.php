<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultLandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('landlord')->table('status')->insert([
            ['name' => 'Activo', 'description' => NULL, 'group' => 'acceso','keyword' => 'acceso-activo'],
            ['name' => 'Suspendido', 'description' => NULL, 'group' => 'acceso','keyword' => 'acceso-supendido'],
            ['name' => 'Falta de pago', 'description' => NULL, 'group' => 'acceso','keyword' => 'acceso-fata_pago'],
            ['name' => 'Activo', 'description' => NULL, 'group' => 'general','keyword' => 'general-activo'],
            ['name' => 'Inactivo', 'description' => NULL, 'group' => 'general','keyword' => 'general-inactivo'],
        ]);

        DB::connection('landlord')->table('type_documents')->insert([
            ['name' => 'AGENDA'],
            ['name' => 'MATERIALES'],
            ['name' => 'MENSAJES'],
            ['name' => 'ADMISIONES'],
            ['name' => 'CIRCULATE_EVENTO'],
            ['name' => 'LOGOS'],
            ['name' => 'FOTOS_ALUMNOS'],
        ]);

        DB::connection('landlord')->table('modules')->insert([
            ['name' => 'Configuracion', 'description' => NULL, 'group' => 'configuration', 'status_id' => 4],
            ['name' => 'Academico', 'description' => NULL, 'group' => 'academic', 'status_id' => 4],
            ['name' => 'Financiero', 'description' => NULL, 'group' => 'financial', 'status_id' => 4],
        ]);

        DB::connection('landlord')->table('tenant_modules')->insert([
            ['tenant_id' => 1, 'module_id' => 1, 'status_id' => 4],
            ['tenant_id' => 1, 'module_id' => 2, 'status_id' => 4],
            ['tenant_id' => 2, 'module_id' => 1, 'status_id' => 4],
            ['tenant_id' => 2, 'module_id' => 2, 'status_id' => 4],
            ['tenant_id' => 3, 'module_id' => 1, 'status_id' => 4],
            ['tenant_id' => 3, 'module_id' => 2, 'status_id' => 4],
        ]);
    }
}
