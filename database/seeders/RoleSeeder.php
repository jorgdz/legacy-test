<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tenant')->table('roles')->insert([
            ['name' => 'SuperAdministrador', 'description' => 'Usuario superadministrador', 'guard_name' => 'api', 'status_id' => 1],
        ]);
        
        DB::connection('tenant')->table('permissions')->insert([
            ['name' => 'Listar perfil', 'description' => 'Listar todos los perfiles', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Obtener perfil', 'description' => 'Obtener un perfil por su identificador único', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Crear perfil', 'description' => 'Agregar un nuevo perfil', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Actualizar perfil', 'description' => 'Actualizar un perfil por su identificador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Borrar un perfil', 'description' => 'Borrar un perfil por su identificador', 'guard_name' => 'api', 'status_id' => 1],
            
            ['name' => 'Listar roles', 'description' => 'Listar todos los roles', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Obtener un rol', 'description' => 'Obtener un rol por su identificador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Crear un rol', 'description' => 'Agregar un nuevo rol', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Actualizar un rol', 'description' => 'Actualizar un rol por su identificador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Borrar un rol', 'description' => 'Borrar un rol por su identificador', 'guard_name' => 'api', 'status_id' => 1],
            
            ['name' => 'Listar permisos', 'description' => 'Listar todos los permisos', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Obtener un permiso', 'description' => 'Obtener un permiso por su identificador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Crear un permiso', 'description' => 'Agregar un nuevo permiso', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Actualizar un permiso', 'description' => 'Actualizar un permiso por su identificador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Borrar un permiso', 'description' => 'Borrar un permiso por su identificador', 'guard_name' => 'api', 'status_id' => 1],
            
            ['name' => 'Mantenimiento de compañias', 'description' => 'Mantenimiento completo de compañias (Crear, borrar, listar, editar, buscar)', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'Mantenimiento de sedes', 'description' => 'Mantenimiento completo de sedes (Crear, borrar, listar, editar, buscar)', 'guard_name' => 'api', 'status_id' => 1],
        ]);
        
        DB::connection('tenant')->table('role_has_permissions')->insert([
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],
            ['permission_id' => 5, 'role_id' => 1],
            
            ['permission_id' => 6, 'role_id' => 1],
            ['permission_id' => 7, 'role_id' => 1],
            ['permission_id' => 8, 'role_id' => 1],
            ['permission_id' => 9, 'role_id' => 1],
            ['permission_id' => 10, 'role_id' => 1],
            
            ['permission_id' => 11, 'role_id' => 1],
            ['permission_id' => 12, 'role_id' => 1],
            ['permission_id' => 13, 'role_id' => 1],
            ['permission_id' => 14, 'role_id' => 1],
            ['permission_id' => 15, 'role_id' => 1],

            ['permission_id' => 16, 'role_id' => 1],
            ['permission_id' => 17, 'role_id' => 1],
        ]);
    }
}
