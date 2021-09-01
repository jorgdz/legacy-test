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
            ['name' => 'Sistemas', 'description' => 'Usuario superadministrador', 'guard_name' => 'api', 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('permissions')->insert([
            [
                'name' => 'profiles-listar-perfil',
                'alias' => 'Listar perfil',
                'description' => 'Listar todos los perfiles',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'profiles-obtener-perfil',
                'alias' => 'Obtener perfil',
                'description' => 'Obtener un perfil por su identificador único',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'profiles-crear-perfil',
                'alias' => 'Crear perfil',
                'description' => 'Agregar un nuevo perfil',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'profiles-actualizar-perfil',
                'alias' => 'Actualizar perfil',
                'description' => 'Actualizar un perfil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'profiles-borrar-un-perfil',
                'alias' => 'Borrar un perfil',
                'description' => 'Borrar un perfil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'profiles-listar-usuarios-por-perfil',
                'alias' => 'Listar usuarios por perfil',
                'description' => 'Listar todos los usuarios por el identificador único del perfil',
                'guard_name' => 'api',
                'status_id' => 1
            ],

            [
                'name' => 'roles-listar-roles',
                'alias' => 'Listar roles',
                'description' => 'Listar todos los roles',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'roles-obtener-rol',
                'alias' => 'Obtener un rol',
                'description' => 'Obtener un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'roles-crear-rol',
                'alias' => 'Crear un rol',
                'description' => 'Agregar un nuevo rol',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'roles-actualizar-rol',
                'alias' => 'Actualizar un rol',
                'description' => 'Actualizar un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'roles-borrar-rol',
                'alias' => 'Borrar un rol',
                'description' => 'Borrar un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'permissions-listar-permisos',
                'alias' => 'Listar permisos',
                'description' => 'Listar todos los permisos',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'permissions-obtener-permiso',
                'alias' => 'Obtener un permiso',
                'description' => 'Obtener un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'permissions-crear-permiso',
                'alias' => 'Crear un permiso',
                'description' => 'Agregar un nuevo permiso',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'permissions-actualizar-permiso',
                'alias' => 'Actualizar un permiso',
                'description' => 'Actualizar un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'permissions-borrar-permiso',
                'alias' => 'Borrar un permiso',
                'description' => 'Borrar un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'companies-mantenimiento-de-companias',
                'alias' => 'Mantenimiento de compañias',
                'description' => 'Mantenimiento completo de compañias (Crear, borrar, listar, editar, buscar)',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'campus-mantenimiento-de-sedes',
                'alias' => 'Mantenimiento de sedes',
                'description' => 'Mantenimiento completo de sedes (Crear, borrar, listar, editar, buscar)',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-listar-perfiles-usuario',
                'alias' => 'Listar perfiles por usuario',
                'description' => 'Listar todos los perfiles por el identificador único del usuario',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-mostrar-perfil-especifico-por-usuario',
                'alias' => 'Mostrar perfil específico por usuario',
                'description' => 'Mostrar en detalle los datos de un perfil por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-guardar-perfil-por-usuario',
                'alias' => 'Guardar perfil por usuario',
                'description' => 'Guardar perfil por el identificador único del usuario',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-actualizar-perfil-por-usuario',
                'alias' => 'Actualizar perfil por usuario',
                'description' => 'Cambiar un perfil existente usando el identificador único del usuario por el identificador de perfil a asociar',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-borrar-perfiles-por-usuario',
                'alias' => 'Borrar perfiles por usuario',
                'description' => 'Borrar todos los perfiles asociados a un usuario por el identificador único',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-borrar-perfil-especifico-por-usuario',
                'alias' => 'Borrar perfil específico por usuario',
                'description' => 'Borrar un perfil asociados a un usuario por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-listar-roles-por-usuario',
                'alias' => 'Listar roles por usuario',
                'description' => 'Listar todos los roles por el identificador único del usuario',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-listar-roles-por-usuario-y-perfil',
                'alias' => 'Listar roles por usuario y perfil',
                'description' => 'Listar roles por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'users-sincronizar-roles-por-usuario-y-perfil',
                'alias' => 'Sincronizar roles por usuario y perfil',
                'description' => 'Sincronizar roles por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'parallels-mantenimiento-de-paralelos',
                'alias' => 'Mantenimiento de paralelos',
                'description' => 'Mantenimiento completo de paralelos (Crear, borrar, listar, editar, buscar)',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'classrooms-mantenimiento-de-aulas',
                'alias' => 'Mantenimiento de aulas',
                'description' => 'Mantenimiento completo de aulas (Crear, borrar, listar, editar, buscar)',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'pensums-listar-pensums',
                'alias' => 'Listar pensums',
                'description' => 'Listar todos los pensums',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'pensums-obtener-pensum',
                'alias' => 'Obtener un pemsun',
                'description' => 'Obtener un pemsun por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'pensums-crear-pensum',
                'alias' => 'Crear un pensum',
                'description' => 'Agregar un nuevo pensum',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'pensums-actualizar-pensum',
                'alias' => 'Actualizar un pensum',
                'description' => 'Actualizar un pensum por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'pensums-borrar-pensum',
                'alias' => 'Borrar un pensum',
                'description' => 'Borrar un pensum por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
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
            ['permission_id' => 18, 'role_id' => 1],
            ['permission_id' => 19, 'role_id' => 1],
            ['permission_id' => 20, 'role_id' => 1],
            ['permission_id' => 21, 'role_id' => 1],
            ['permission_id' => 22, 'role_id' => 1],

            ['permission_id' => 23, 'role_id' => 1],
            ['permission_id' => 24, 'role_id' => 1],
            ['permission_id' => 25, 'role_id' => 1],
            ['permission_id' => 26, 'role_id' => 1],
            ['permission_id' => 27, 'role_id' => 1],

            ['permission_id' => 28, 'role_id' => 1],
            ['permission_id' => 29, 'role_id' => 1],

            ['permission_id' => 30, 'role_id' => 1],
            ['permission_id' => 31, 'role_id' => 1],
            ['permission_id' => 32, 'role_id' => 1],
            ['permission_id' => 33, 'role_id' => 1],
            ['permission_id' => 34, 'role_id' => 1],
        ]);
    }
}
