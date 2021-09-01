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
            /**
             * Perfiles
             */
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
            /**
             * Roles
             */
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
            /**
             * Permisos
             */
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
            /**
             * Compañias
             */
            [
                'name' => 'companies-listar-companias',
                'alias' => 'Listar compañias',
                'description' => 'Listar todas las compañias',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'companies-obtener-compania',
                'alias' => 'Obtener una compañia',
                'description' => 'Obtener una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'companies-crear-compania',
                'alias' => 'Crear una compañia',
                'description' => 'Agregar una nueva compañia',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'companies-actualizar-compania',
                'alias' => 'Actualizar una compañia',
                'description' => 'Actualizar una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'companies-borrar-compania',
                'alias' => 'Borrar una compañia',
                'description' => 'Borrar una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            /**
             * Sedes
             */
            [
                'name' => 'campus-listar-sedes',
                'alias' => 'Listar sedes',
                'description' => 'Listar todas las sedes',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'campus-obtener-sede',
                'alias' => 'Obtener una sede',
                'description' => 'Obtener una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'campus-crear-sede',
                'alias' => 'Crear una sede',
                'description' => 'Agregar una nueva sede',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'campus-actualizar-sede',
                'alias' => 'Actualizar una sede',
                'description' => 'Actualizar una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'campus-borrar-sede',
                'alias' => 'Borrar una sede',
                'description' => 'Borrar una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            /**
             * Usuarios
             */
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
            /**
             * Paralelos
             */
            [
                'name' => 'parallels-listar-paralelos',
                'alias' => 'Listar paralelos',
                'description' => 'Listar todas las paralelos',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'parallels-obtener-paralelo',
                'alias' => 'Obtener un paralelo',
                'description' => 'Obtener un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'parallels-crear-paralelo',
                'alias' => 'Crear un paralelo',
                'description' => 'Agregar un nuevo paralelo',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'parallels-actualizar-paralelo',
                'alias' => 'Actualizar un paralelo',
                'description' => 'Actualizar un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'parallels-borrar-paralelo',
                'alias' => 'Borrar un paralelo',
                'description' => 'Borrar un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            /**
             * Aulas
             */
            [
                'name' => 'classrooms-listar-aulas',
                'alias' => 'Listar aulas',
                'description' => 'Listar todas las aulas',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'classrooms-obtener-aula',
                'alias' => 'Obtener un aula',
                'description' => 'Obtener una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'classrooms-crear-aula',
                'alias' => 'Crear un aula',
                'description' => 'Agregar una nueva aula',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'classrooms-actualizar-aula',
                'alias' => 'Actualizar un aula',
                'description' => 'Actualizar una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'classrooms-borrar-aula',
                'alias' => 'Borrar un aula',
                'description' => 'Borrar una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            /**
             * Pensum
             */
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
            /**
             * Etapas
             */
            [
                'name' => 'stages-listar-etapas',
                'alias' => 'Listar etapas',
                'description' => 'Listar todas las etapas',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'stages-obtener-etapa',
                'alias' => 'Obtener una etapa',
                'description' => 'Obtener un pemsun por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'stages-crear-etapa',
                'alias' => 'Crear una etapa',
                'description' => 'Agregar una nueva etapa',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'stages-actualizar-etapa',
                'alias' => 'Actualizar una etapa',
                'description' => 'Actualizar una etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
            [
                'name' => 'stages-borrar-etapa',
                'alias' => 'Borrar una etapa',
                'description' => 'Borrar una etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1
            ],
        ]);

        DB::connection('tenant')->table('role_has_permissions')->insert([
            /**
             * Perfiles
             */
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],
            ['permission_id' => 5, 'role_id' => 1],
            ['permission_id' => 6, 'role_id' => 1],
            /**
             * Roles
             */
            ['permission_id' => 7, 'role_id' => 1],
            ['permission_id' => 8, 'role_id' => 1],
            ['permission_id' => 9, 'role_id' => 1],
            ['permission_id' => 10, 'role_id' => 1],
            ['permission_id' => 11, 'role_id' => 1],
            /**
             * Permisos
             */
            ['permission_id' => 12, 'role_id' => 1],
            ['permission_id' => 13, 'role_id' => 1],
            ['permission_id' => 14, 'role_id' => 1],
            ['permission_id' => 15, 'role_id' => 1],
            ['permission_id' => 16, 'role_id' => 1],
            /**
             * Compañias
             */
            ['permission_id' => 17, 'role_id' => 1],
            ['permission_id' => 18, 'role_id' => 1],
            ['permission_id' => 19, 'role_id' => 1],
            ['permission_id' => 20, 'role_id' => 1],
            ['permission_id' => 21, 'role_id' => 1],
            /**
             * Sedes
             */
            ['permission_id' => 22, 'role_id' => 1],
            ['permission_id' => 23, 'role_id' => 1],
            ['permission_id' => 24, 'role_id' => 1],
            ['permission_id' => 25, 'role_id' => 1],
            ['permission_id' => 26, 'role_id' => 1],
            /**
             * Usuarios
             */
            ['permission_id' => 27, 'role_id' => 1],
            ['permission_id' => 28, 'role_id' => 1],
            ['permission_id' => 29, 'role_id' => 1],
            ['permission_id' => 30, 'role_id' => 1],
            ['permission_id' => 31, 'role_id' => 1],
            ['permission_id' => 32, 'role_id' => 1],
            ['permission_id' => 33, 'role_id' => 1],
            ['permission_id' => 34, 'role_id' => 1],
            ['permission_id' => 35, 'role_id' => 1],
            /**
             * Paralelos
             */
            ['permission_id' => 36, 'role_id' => 1],
            ['permission_id' => 37, 'role_id' => 1],
            ['permission_id' => 38, 'role_id' => 1],
            ['permission_id' => 39, 'role_id' => 1],
            ['permission_id' => 40, 'role_id' => 1],
            /**
             * Aulas
             */
            ['permission_id' => 41, 'role_id' => 1],
            ['permission_id' => 42, 'role_id' => 1],
            ['permission_id' => 43, 'role_id' => 1],
            ['permission_id' => 44, 'role_id' => 1],
            ['permission_id' => 45, 'role_id' => 1],
            /**
             * Pensum
             */
            ['permission_id' => 46, 'role_id' => 1],
            ['permission_id' => 47, 'role_id' => 1],
            ['permission_id' => 48, 'role_id' => 1],
            ['permission_id' => 49, 'role_id' => 1],
            ['permission_id' => 50, 'role_id' => 1],
            /**
             * Etapas
             */
            ['permission_id' => 51, 'role_id' => 1],
            ['permission_id' => 52, 'role_id' => 1],
            ['permission_id' => 53, 'role_id' => 1],
            ['permission_id' => 54, 'role_id' => 1],
            ['permission_id' => 55, 'role_id' => 1],
        ]);
    }
}
