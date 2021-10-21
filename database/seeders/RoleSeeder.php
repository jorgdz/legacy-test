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
            ['name' => 'SUPERADMINISTRADOR', 'keyword' => 'superadministrador', 'description' => 'Usuario superadministrador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'ADMINISTRADOR', 'keyword' => 'administrador', 'description' => 'Rol administrador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'SOPORTE', 'keyword' => 'soporte', 'description' => 'Rol de soporte', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'VICERRECTORADO', 'keyword' => 'vicerrectorado', 'description' => 'Rol de soporte', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'POSTGRADO', 'keyword' => 'postgrado', 'description' => 'Rol de postgrado', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'BIENESTAR ESTUDIANTIL', 'keyword' => 'bienestar-estudiantil', 'description' => 'Rol de Bienestar Estudiantil', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'PLANIFICACION', 'keyword' => 'planificacion', 'description' => 'Rol de Planificacion', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'SECRETARIA', 'keyword' => 'secretaria', 'description' => 'Rol de Secretaria', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'ECOTEC INTERNATIONAL', 'keyword' => 'ecotec-international', 'description' => 'Rol de Ecotec International', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'VINCULACION', 'keyword' => 'vinculacion', 'description' => 'Rol de Vinculacion', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'INVESTIGACION', 'keyword' => 'investigacion', 'description' => 'Rol de Investigacion', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'DECANO', 'keyword' => 'decano', 'description' => 'Rol de decano', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'ADMISIONES', 'keyword' => 'admisiones', 'description' => 'Rol de admisiones', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'COORD. ACADEMICA', 'keyword' => 'coord-academica', 'description' => 'Rol de Coordinacion Academica', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'IDIOMA', 'keyword' => 'idioma', 'description' => 'Rol de Idioma', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'RECURSOS HUMANOS', 'keyword' => 'recursos-humanos', 'description' => 'Rol de Recursos Humanos', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'DOCENTES', 'keyword' => 'docente', 'description' => 'Rol de Docentes', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'FINANZAS', 'keyword' => 'financiero', 'description' => 'Rol de Finanzas', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'COORDINADOR FACULTAD', 'keyword' => 'coordinador-facultad', 'description' => 'Rol de Coordinador de Facultad', 'guard_name' => 'api', 'status_id' => 1],
        ]);

        DB::connection('tenant')->table('permissions')->insert([
            /**
             * Perfiles 1-6
             */
            [
                'name' => 'profiles-listar-perfil',
                'alias' => 'Listar perfil',
                'description' => 'Listar todos los perfiles',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles',
                'parent_name_translated' => 'perfiles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'profiles-obtener-perfil',
                'alias' => 'Obtener perfil',
                'description' => 'Obtener un perfil por su identificador único',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles',
                'parent_name_translated' => 'perfiles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'profiles-crear-perfil',
                'alias' => 'Crear perfil',
                'description' => 'Agregar un nuevo perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles',
                'parent_name_translated' => 'perfiles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'profiles-actualizar-perfil',
                'alias' => 'Actualizar perfil',
                'description' => 'Actualizar un perfil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles',
                'parent_name_translated' => 'perfiles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'profiles-borrar-un-perfil',
                'alias' => 'Borrar un perfil',
                'description' => 'Borrar un perfil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles',
                'parent_name_translated' => 'perfiles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'profiles-listar-usuarios-por-perfil',
                'alias' => 'Listar usuarios por perfil',
                'description' => 'Listar todos los usuarios por el identificador único del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles',
                'parent_name_translated' => 'perfiles',
                'module_group' => 'configuration'
            ],
            /**
             * Roles 7-11
             */
            [
                'name' => 'roles-listar-roles',
                'alias' => 'Listar roles',
                'description' => 'Listar todos los roles',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles',
                'parent_name_translated' => 'roles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'roles-obtener-rol',
                'alias' => 'Obtener un rol',
                'description' => 'Obtener un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles',
                'parent_name_translated' => 'roles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'roles-crear-rol',
                'alias' => 'Crear un rol',
                'description' => 'Agregar un nuevo rol',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles',
                'parent_name_translated' => 'roles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'roles-actualizar-rol',
                'alias' => 'Actualizar un rol',
                'description' => 'Actualizar un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles',
                'parent_name_translated' => 'roles',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'roles-borrar-rol',
                'alias' => 'Borrar un rol',
                'description' => 'Borrar un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles',
                'parent_name_translated' => 'roles',
                'module_group' => 'configuration'
            ],
            /**
             * Permisos 12-16
             */
            [
                'name' => 'permissions-listar-permisos',
                'alias' => 'Listar permisos',
                'description' => 'Listar todos los permisos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions',
                'parent_name_translated' => 'permisos',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'permissions-obtener-permiso',
                'alias' => 'Obtener un permiso',
                'description' => 'Obtener un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions',
                'parent_name_translated' => 'permisos',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'permissions-crear-permiso',
                'alias' => 'Crear un permiso',
                'description' => 'Agregar un nuevo permiso',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions',
                'parent_name_translated' => 'permisos',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'permissions-actualizar-permiso',
                'alias' => 'Actualizar un permiso',
                'description' => 'Actualizar un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions',
                'parent_name_translated' => 'permisos',
                'module_group' => 'configuration'
            ],
            [
                'name' => 'permissions-borrar-permiso',
                'alias' => 'Borrar un permiso',
                'description' => 'Borrar un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions',
                'parent_name_translated' => 'permisos',
                'module_group' => 'configuration'
            ],
            /**
             * Compañias 17-21
             */
            [
                'name' => 'companies-listar-companias',
                'alias' => 'Listar compañias',
                'description' => 'Listar todas las compañias',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies',
                'parent_name_translated' => 'compañías',
                'module_group' => 'academic'
            ],
            [
                'name' => 'companies-obtener-compania',
                'alias' => 'Obtener una compañia',
                'description' => 'Obtener una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies',
                'parent_name_translated' => 'compañías',
                'module_group' => 'academic'
            ],
            [
                'name' => 'companies-crear-compania',
                'alias' => 'Crear una compañia',
                'description' => 'Agregar una nueva compañia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies',
                'parent_name_translated' => 'compañías',
                'module_group' => 'academic'
            ],
            [
                'name' => 'companies-actualizar-compania',
                'alias' => 'Actualizar una compañia',
                'description' => 'Actualizar una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies',
                'parent_name_translated' => 'compañías',
                'module_group' => 'academic'
            ],
            [
                'name' => 'companies-borrar-compania',
                'alias' => 'Borrar una compañia',
                'description' => 'Borrar una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies',
                'parent_name_translated' => 'compañías',
                'module_group' => 'academic'
            ],
            /**
             * Sedes 22-26
             */
            [
                'name' => 'campus-listar-sedes',
                'alias' => 'Listar sedes',
                'description' => 'Listar todas las sedes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus',
                'parent_name_translated' => 'sedes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'campus-obtener-sede',
                'alias' => 'Obtener una sede',
                'description' => 'Obtener una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus',
                'parent_name_translated' => 'sedes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'campus-crear-sede',
                'alias' => 'Crear una sede',
                'description' => 'Agregar una nueva sede',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus',
                'parent_name_translated' => 'sedes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'campus-actualizar-sede',
                'alias' => 'Actualizar una sede',
                'description' => 'Actualizar una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus',
                'parent_name_translated' => 'sedes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'campus-borrar-sede',
                'alias' => 'Borrar una sede',
                'description' => 'Borrar una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus',
                'parent_name_translated' => 'sedes',
                'module_group' => 'academic'
            ],
            /**
             * Usuarios 27-35
             */
            [
                'name' => 'users-listar-perfiles-usuario',
                'alias' => 'Listar perfiles por usuario',
                'description' => 'Listar todos los perfiles por el identificador único del usuario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-mostrar-perfil-especifico-por-usuario',
                'alias' => 'Mostrar perfil específico por usuario',
                'description' => 'Mostrar en detalle los datos de un perfil por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-guardar-perfil-por-usuario',
                'alias' => 'Guardar perfil por usuario',
                'description' => 'Guardar perfil por el identificador único del usuario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-actualizar-perfil-por-usuario',
                'alias' => 'Actualizar perfil por usuario',
                'description' => 'Cambiar un perfil existente usando el identificador único del usuario por el identificador de perfil a asociar',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-borrar-perfiles-por-usuario',
                'alias' => 'Borrar perfiles por usuario',
                'description' => 'Borrar todos los perfiles asociados a un usuario por el identificador único',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-borrar-perfil-especifico-por-usuario',
                'alias' => 'Borrar perfil específico por usuario',
                'description' => 'Borrar un perfil asociados a un usuario por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-listar-roles-por-usuario',
                'alias' => 'Listar roles por usuario',
                'description' => 'Listar todos los roles por el identificador único del usuario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-listar-roles-por-usuario-y-perfil',
                'alias' => 'Listar roles por usuario y perfil',
                'description' => 'Listar roles por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-sincronizar-roles-por-usuario-y-perfil',
                'alias' => 'Sincronizar roles por usuario y perfil',
                'description' => 'Sincronizar roles por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            /**
             * Paralelos 36-42
             */
            [
                'name' => 'parallels-listar-paralelos',
                'alias' => 'Listar paralelos',
                'description' => 'Listar todas las paralelos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels',
                'parent_name_translated' => 'paralelos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'parallels-obtener-paralelo',
                'alias' => 'Obtener un paralelo',
                'description' => 'Obtener un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels',
                'parent_name_translated' => 'paralelos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'parallels-crear-paralelo',
                'alias' => 'Crear un paralelo',
                'description' => 'Agregar un nuevo paralelo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels',
                'parent_name_translated' => 'paralelos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'parallels-actualizar-paralelo',
                'alias' => 'Actualizar un paralelo',
                'description' => 'Actualizar un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels',
                'parent_name_translated' => 'paralelos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'parallels-borrar-paralelo',
                'alias' => 'Borrar un paralelo',
                'description' => 'Borrar un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels',
                'parent_name_translated' => 'paralelos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'parallels-activar-paralelo',
                'alias' => 'Activar un paralelo',
                'description' => 'Activa un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels',
                'parent_name_translated' => 'paralelos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'parallels-desactivar-paralelo',
                'alias' => 'Desactivar un paralelo',
                'description' => 'Desactiva un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels',
                'parent_name_translated' => 'paralelos',
                'module_group' => 'academic'
            ],
            /**
             * Aulas 43-49
             */
            [
                'name' => 'classrooms-listar-aulas',
                'alias' => 'Listar aulas',
                'description' => 'Listar todas las aulas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms',
                'parent_name_translated' => 'aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classrooms-obtener-aula',
                'alias' => 'Obtener un aula',
                'description' => 'Obtener una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms',
                'parent_name_translated' => 'aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classrooms-crear-aula',
                'alias' => 'Crear un aula',
                'description' => 'Agregar una nueva aula',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms',
                'parent_name_translated' => 'aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classrooms-actualizar-aula',
                'alias' => 'Actualizar un aula',
                'description' => 'Actualizar una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms',
                'parent_name_translated' => 'aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classrooms-borrar-aula',
                'alias' => 'Borrar un aula',
                'description' => 'Borrar una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms',
                'parent_name_translated' => 'aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classrooms-activar-aula',
                'alias' => 'Activar un aula',
                'description' => 'Activa un aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms',
                'parent_name_translated' => 'aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classrooms-desactivar-aula',
                'alias' => 'Desactivar un aula',
                'description' => 'Desactiva un aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms',
                'parent_name_translated' => 'aulas',
                'module_group' => 'academic'
            ],
            /**
             * Pensum 50-54
             */
            [
                'name' => 'pensums-listar-pensums',
                'alias' => 'Listar pensums',
                'description' => 'Listar todos los pensums',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums',
                'parent_name_translated' => 'pensums',
                'module_group' => 'academic'
            ],
            [
                'name' => 'pensums-obtener-pensum',
                'alias' => 'Obtener un pemsun',
                'description' => 'Obtener un pemsun por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums',
                'parent_name_translated' => 'pensums',
                'module_group' => 'academic'
            ],
            [
                'name' => 'pensums-crear-pensum',
                'alias' => 'Crear un pensum',
                'description' => 'Agregar un nuevo pensum',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums',
                'parent_name_translated' => 'pensums',
                'module_group' => 'academic'
            ],
            [
                'name' => 'pensums-actualizar-pensum',
                'alias' => 'Actualizar un pensum',
                'description' => 'Actualizar un pensum por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums',
                'parent_name_translated' => 'pensums',
                'module_group' => 'academic'
            ],
            [
                'name' => 'pensums-borrar-pensum',
                'alias' => 'Borrar un pensum',
                'description' => 'Borrar un pensum por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums',
                'parent_name_translated' => 'pensums',
                'module_group' => 'academic'
            ],
            /**
             * Etapas 55-59
             */
            [
                'name' => 'stages-listar-etapas',
                'alias' => 'Listar etapas',
                'description' => 'Listar todas las etapas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages',
                'parent_name_translated' => 'etapas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'stages-obtener-etapa',
                'alias' => 'Obtener una etapa',
                'description' => 'Obtener un pemsun por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages',
                'parent_name_translated' => 'etapas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'stages-crear-etapa',
                'alias' => 'Crear una etapa',
                'description' => 'Agregar una nueva etapa',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages',
                'parent_name_translated' => 'etapas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'stages-actualizar-etapa',
                'alias' => 'Actualizar una etapa',
                'description' => 'Actualizar una etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages',
                'parent_name_translated' => 'etapas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'stages-borrar-etapa',
                'alias' => 'Borrar una etapa',
                'description' => 'Borrar una etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages',
                'parent_name_translated' => 'etapas',
                'module_group' => 'academic'
            ],
            /**
             * Tipos de Periodos 60-64
             */
            [
                'name' => 'typePeriods-listar-tiposPeriodos',
                'alias' => 'Listar tipos de periodos',
                'description' => 'Listar todos los tipos de periodos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods',
                'parent_name_translated' => 'tipos de períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'typePeriods-obtener-tipoPeriodo',
                'alias' => 'Obtener un tipo de periodo',
                'description' => 'Obtener un tipo de periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods',
                'parent_name_translated' => 'tipos de períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'typePeriods-crear-tipoPeriodo',
                'alias' => 'Crear un tipo de periodo',
                'description' => 'Agregar un tipo de periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods',
                'parent_name_translated' => 'tipos de períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'typePeriods-actualizar-tipoPeriodo',
                'alias' => 'Actualizar un tipo de periodo',
                'description' => 'Actualizar un tipo de periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods',
                'parent_name_translated' => 'tipos de períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'typePeriods-borrar-tipoPeriodo',
                'alias' => 'Borrar un tipo de periodo',
                'description' => 'Borrar un tipo de periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods',
                'parent_name_translated' => 'tipos de períodos',
                'module_group' => 'academic'
            ],
            /**
             *  Mallas academicas [Meshs] JS 65-69
             */
            [
                'name' => 'meshs-listar-mallas',
                'alias' => 'Listar mallas',
                'description' => 'Listar todas las mallas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'mallas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'meshs-obtener-malla',
                'alias' => 'Obtener una malla',
                'description' => 'Obtener una malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'mallas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'meshs-crear-mallas',
                'alias' => 'Crear una malla',
                'description' => 'Agregar una nueva malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'mallas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'meshs-actualizar-mallas',
                'alias' => 'Actualizar una malla',
                'description' => 'Actualizar una malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'mallas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'meshs-borrar-malla',
                'alias' => 'Borrar una malla',
                'description' => 'Borrar una malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'mallas',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Calificaciones 70-74
             */
            [
                'name' => 'type-califications-listar-type-califications',
                'alias' => 'Listar tipos de calificaciones',
                'description' => 'Listar todos los tipo de calificaciones',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications',
                'parent_name_translated' => 'tipos de calificaciones',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-califications-obtener-type-calification',
                'alias' => 'Obtener un tipo de calificacion',
                'description' => 'Obtener un tipo de calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications',
                'parent_name_translated' => 'tipos de calificaciones',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-califications-crear-type-calification',
                'alias' => 'Crear un tipo calificacion',
                'description' => 'Agregar un nuevo tipo calificacion',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications',
                'parent_name_translated' => 'tipos de calificaciones',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-califications-actualizar-type-calification',
                'alias' => 'Actualizar un tipo calificacion',
                'description' => 'Actualizar un tipo calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications',
                'parent_name_translated' => 'tipos de calificaciones',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-califications-borrar-type-calification',
                'alias' => 'Borrar un tipo calificacion',
                'description' => 'Borrar un tipo calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications',
                'parent_name_translated' => 'tipos de calificaciones',
                'module_group' => 'academic'
            ],
            /**
             * Tipos de Materias 75-79
             */
            [
                'name' => 'type-matters-listar-type-matters',
                'alias' => 'Listar tipos de materias',
                'description' => 'Listar todos los tipo de materias',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters',
                'parent_name_translated' => 'tipos de materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-matters-obtener-type-matter',
                'alias' => 'Obtener un tipo de materia',
                'description' => 'Obtener un tipo de materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters',
                'parent_name_translated' => 'tipos de materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-matters-crear-type-matter',
                'alias' => 'Crear un tipo materia',
                'description' => 'Agregar un nuevo tipo materia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters',
                'parent_name_translated' => 'tipos de materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-matters-actualizar-type-matter',
                'alias' => 'Actualizar un tipo materia',
                'description' => 'Actualizar un tipo materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters',
                'parent_name_translated' => 'tipos de materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-matters-borrar-type-matter',
                'alias' => 'Borrar un tipo materia',
                'description' => 'Borrar un tipo materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters',
                'parent_name_translated' => 'tipos de materias',
                'module_group' => 'academic'
            ],
            /**
             * Materias 80-84
             */
            [
                'name' => 'matters-listar-matters',
                'alias' => 'Listar materias',
                'description' => 'Listar todas las materias',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters',
                'parent_name_translated' => 'materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'matters-obtener-matter',
                'alias' => 'Obtener una materia',
                'description' => 'Obtener una materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters',
                'parent_name_translated' => 'materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'matters-crear-matter',
                'alias' => 'Crear una materia',
                'description' => 'Agregar una nueva materia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters',
                'parent_name_translated' => 'materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'matters-actualizar-matter',
                'alias' => 'Actualizar una materia',
                'description' => 'Actualizar una materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters',
                'parent_name_translated' => 'materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'matters-borrar-matter',
                'alias' => 'Borrar una materia',
                'description' => 'Borrar una materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters',
                'parent_name_translated' => 'materias',
                'module_group' => 'academic'
            ],
            /**
             * Periodos por etapas 85-89
             */
            [
                'name' => 'periodStages-listar-periodoEtapa',
                'alias' => 'Listar los periodos por etapas',
                'description' => 'Listar todos los periodos por etapas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages',
                'parent_name_translated' => 'períodos por etapas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periodStages-obtener-periodoEtapa',
                'alias' => 'Obtener un registro asociado periodo_etapa',
                'description' => 'Obtener una relacion periodo_etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages',
                'parent_name_translated' => 'períodos por etapas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periodStages-crear-periodoEtapa',
                'alias' => 'Crear un registro asociado periodo_etapa',
                'description' => 'Agregar un registro asociado de periodo_etapa',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages',
                'parent_name_translated' => 'períodos por etapas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periodStages-actualizar-periodoEtapa',
                'alias' => 'Actualizar un registro asociado periodo_etapa',
                'description' => 'Actualizar un registro asociado de periodo_etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages',
                'parent_name_translated' => 'períodos por etapas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periodStages-borrar-periodoEtapa',
                'alias' => 'Borrar un registro asociado de periodo_etapa',
                'description' => 'Borrar un registro asociado de periodo_etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages',
                'parent_name_translated' => 'períodos por etapas',
                'module_group' => 'academic'
            ],
            /**
             * User Colaboradores 90-91
             */
            [
                'name' => 'users-lista-usuario-diferente-colaborador',
                'alias' => 'Listar usuario que no sean colaborador',
                'description' => 'Listar usuario que no sean colaborador desde el usuario administrador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-change-password',
                'alias' => 'Cambiar la contraseña del perfil',
                'description' => 'Cambiar la contraseña de un usuario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            /**
             * Periodos 92-96
             */
            [
                'name' => 'periods-listar-periodos',
                'alias' => 'Listar periodos',
                'description' => 'Listar todos los periodos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periods-obtener-periodo',
                'alias' => 'Obtener periodo',
                'description' => 'Obtener un periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periods-crear-periodo',
                'alias' => 'Crear periodo',
                'description' => 'Agregar un periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periods-actualizar-periodo',
                'alias' => 'Actualizar periodo',
                'description' => 'Actualizar un periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periods-borrar-periodo',
                'alias' => 'Borrar periodo',
                'description' => 'Borrar un periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'períodos',
                'module_group' => 'academic'
            ],
            /**
             * Materias por Malla 97-101
             */
            [
                'name' => 'mattermesh-listar-materias-mallas',
                'alias' => 'Listar materias por malla',
                'description' => 'Listar todas las materias por malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'materias por malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'mattermesh-obtener-materias-mallas',
                'alias' => 'Obtener un registro relacionado matter_mesh',
                'description' => 'Obtener materias relacionadas con el identificador de una malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'materias por malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'mattermesh-crear-materias-mallas',
                'alias' => 'Crear un registro relacionado matter_mesh',
                'description' => 'Agregar un registro relacional entre materia y malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'materias por malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'mattermesh-actualizar-materias-mallas',
                'alias' => 'Actualizar un registro relacionado matter_mesh',
                'description' => 'Actualizar un registro relacional entre materia y malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'materias por malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'mattermesh-borrar-materias-mallas',
                'alias' => 'Borrar un registro relacionado matter_mesh',
                'description' => 'Borrar un registro relacional entre materia y malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'materias por malla',
                'module_group' => 'academic'
            ],



        ]);

        DB::connection('tenant')->table('permissions')->insert([
            /**
             * Ofertas 102-106
             */
            [
                'name' => 'offers-listar-ofertas',
                'alias' => 'Listar ofertas',
                'description' => 'Listar todas las ofertas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'ofertas académicas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'offers-obtener-oferta',
                'alias' => 'Obtener oferta',
                'description' => 'Obtener una oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'ofertas académicas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'offers-crear-oferta',
                'alias' => 'Crear oferta',
                'description' => 'Agregar una oferta',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'ofertas académicas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'offers-actualizar-oferta',
                'alias' => 'Actualizar oferta',
                'description' => 'Actualizar una oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'ofertas académicas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'offers-borrar-oferta',
                'alias' => 'Borrar oferta',
                'description' => 'Borrar una oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'ofertas académicas',
                'module_group' => 'academic'
            ],
            /**
             * Horarios 107-111
             */
            [
                'name' => 'hourhands-listar-horarios',
                'alias' => 'Listar horarios',
                'description' => 'Listar todos los horarios',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand',
                'parent_name_translated' => 'horarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'hourhands-obtener-horario',
                'alias' => 'Obtener horario',
                'description' => 'Obtener un horario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand',
                'parent_name_translated' => 'horarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'hourhands-crear-horario',
                'alias' => 'Crear horario',
                'description' => 'Agregar un horario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand',
                'parent_name_translated' => 'horarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'hourhands-actualizar-horario',
                'alias' => 'Actualizar horario',
                'description' => 'Actualizar un horario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand',
                'parent_name_translated' => 'horarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'hourhands-borrar-horario',
                'alias' => 'Borrar horario',
                'description' => 'Borrar un horario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand',
                'parent_name_translated' => 'horarios',
                'module_group' => 'academic'
            ],
            /**
             * Institutos 112-116
             */
            [
                'name' => 'institutes-listar-institutos',
                'alias' => 'Listar institutos',
                'description' => 'Listar todos los institutos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes',
                'parent_name_translated' => 'institutos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institutes-obtener-instituto',
                'alias' => 'Obtener instituto',
                'description' => 'Obtener un instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes',
                'parent_name_translated' => 'institutos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institutes-crear-instituto',
                'alias' => 'Crear instituto',
                'description' => 'Agregar un instituto',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes',
                'parent_name_translated' => 'institutos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institutes-actualizar-instituto',
                'alias' => 'Actualizar instituto',
                'description' => 'Actualizar un instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes',
                'parent_name_translated' => 'institutos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institutes-eliminar-instituto',
                'alias' => 'Borrar instituto',
                'description' => 'Borrar un instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes',
                'parent_name_translated' => 'institutos',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Institutos 117-121
             */
            [
                'name' => 'institutetype-listar-tipos-de-institutos',
                'alias' => 'Listar tipos de institutos',
                'description' => 'Listar todos los tipos institutos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType',
                'parent_name_translated' => 'tipos de institutos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institutetype-obtener-tipo-de-instituto',
                'alias' => 'Obtener tipo instituto',
                'description' => 'Obtener un tipo de instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType',
                'parent_name_translated' => 'tipos de institutos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institutetype-crear-tipo-de-instituto',
                'alias' => 'Crear tipo instituto',
                'description' => 'Agregar un tipo de instituto',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType',
                'parent_name_translated' => 'tipos de institutos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institutetype-actualizar-tipo-de-instituto',
                'alias' => 'Actualizar tipo instituto',
                'description' => 'Actualizar un tipo de instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType',
                'parent_name_translated' => 'tipos de institutos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institutetype-eliminar-tipo-de-instituto',
                'alias' => 'Borrar tipo instituto',
                'description' => 'Borrar un tipo de instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType',
                'parent_name_translated' => 'tipos de institutos',
                'module_group' => 'academic'
            ],
            /**
             * Mail 122-124
             */
            [
                'name' => 'mails-listar-mails',
                'alias' => 'Listar mails',
                'description' => 'Listar todos los mails',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mail',
                'parent_name_translated' => 'correo',
                'module_group' => 'academic'
            ],
            [
                'name' => 'mails-obtener-mail',
                'alias' => 'Obtener mail',
                'description' => 'Obtener un mail por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mail',
                'parent_name_translated' => 'correo',
                'module_group' => 'academic'
            ],
            [
                'name' => 'mails-actualizar-mail',
                'alias' => 'Actualizar mail',
                'description' => 'Actualizar un mail por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mail',
                'parent_name_translated' => 'correo',
                'module_group' => 'academic'
            ],
            /**
             * Estado Materia 125-129
             */
            [
                'name' => 'matter-status-listar-matter-status',
                'alias' => 'Listar matter_status',
                'description' => 'Listar todos los estados materias',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus',
                'parent_name_translated' => 'estado de materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'matter-status-obtener-matter-status',
                'alias' => 'Obtener matter_status',
                'description' => 'Obtener un estado materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus',
                'parent_name_translated' => 'estado de materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'matter-status-crear-matter-status',
                'alias' => 'Crear matter_status',
                'description' => 'Agregar un estado materia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus',
                'parent_name_translated' => 'estado de materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'matter-status-actualizar-matter-status',
                'alias' => 'Actualizar matter_status',
                'description' => 'Actualizar un estado materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus',
                'parent_name_translated' => 'estado de materias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'matter-status-borrar-matter-status',
                'alias' => 'Borrar matter_status',
                'description' => 'Borrar un estado materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus',
                'parent_name_translated' => 'estado de materias',
                'module_group' => 'academic'
            ],
            /**
             * Usuario 130-132
             */
            [
                'name' => 'users-crear-usuario',
                'alias' => 'Crear usuario',
                'description' => 'Agregar un usuario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-actualizar-usuario',
                'alias' => 'Actualizar usuario',
                'description' => 'Actualizar un usuario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-borrar-usuario',
                'alias' => 'Borrar usuario',
                'description' => 'Borrar un usuario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            /**
             * Niveles Educativos 133-137
             */
            [
                'name' => 'education-levels-listar-niveles-educativos',
                'alias' => 'Listar niveles educativos',
                'description' => 'Listar todos los niveles educativos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel',
                'parent_name_translated' => 'niveles educativos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'education-levels-obtener-nivel-educativo',
                'alias' => 'Obtener nivel educativo',
                'description' => 'Obtener un nivel educativo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel',
                'parent_name_translated' => 'niveles educativos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'education-levels-crear-nivel-educativo',
                'alias' => 'Crear nivel educativo',
                'description' => 'Agregar un nivel educativo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel',
                'parent_name_translated' => 'niveles educativos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'education-levels-actualizar-nivel-educativo',
                'alias' => 'Actualizar nivel educativo',
                'description' => 'Actualizar un nivel educativo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel',
                'parent_name_translated' => 'niveles educativos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'education-levels-borrar-nivel-educativo',
                'alias' => 'Borrar nivel educativo',
                'description' => 'Borrar un nivel ecucativo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel',
                'parent_name_translated' => 'niveles educativos',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Estudiante 138-139
             */
            [
                'name' => 'type_students-listar-tipos-estudiantes',
                'alias' => 'Listar tipos de estudiantes',
                'description' => 'Listar todos los tipos de estudiantes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudent',
                'parent_name_translated' => 'tipos de estudiantes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type_students-obtener-tipo-estudiante',
                'alias' => 'Obtener tipo de estudiante',
                'description' => 'Obtener un tipo de estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudent',
                'parent_name_translated' => 'tipos de estudiantes',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Documento 140-144
             */
            [
                'name' => 'type-document-listar-tipo-documento',
                'alias' => 'Listar tipo documentos',
                'description' => 'Listar todos los tipos de documentos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument',
                'parent_name_translated' => 'tipos de documentos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-document-obtener-tipo-documento',
                'alias' => 'Obtener tipo documento',
                'description' => 'Obtener un tipo de documento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument',
                'parent_name_translated' => 'tipos de documentos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-document-crear-tipo-documento',
                'alias' => 'Crear tipo documento',
                'description' => 'Agregar un tipo de documento',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument',
                'parent_name_translated' => 'tipos de documentos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-document-actualizar-tipo-documento',
                'alias' => 'Actualizar tipo documento',
                'description' => 'Actualizar un tipo de documento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument',
                'parent_name_translated' => 'tipos de documentos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-document-borrar-tipo-documento',
                'alias' => 'Borrar tipo documento',
                'description' => 'Borrar un tipo documento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument',
                'parent_name_translated' => 'tipos de documentos',
                'module_group' => 'academic'
            ],
            /**
             * Grupo Economico 145-149
             */
            [
                'name' => 'economic_group-listar-grupo-economico',
                'alias' => 'Listar grupo economico',
                'description' => 'Listar todos los grupos economicos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup',
                'parent_name_translated' => 'grupos económicos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'economic_group-obtener-grupo-economico',
                'alias' => 'Obtener grupo economico',
                'description' => 'Obtener un grupo economico por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup',
                'parent_name_translated' => 'grupos económicos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'economic_group-crear-grupo-economico',
                'alias' => 'Crear grupo economico',
                'description' => 'Agregar un grupo economico',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup',
                'parent_name_translated' => 'grupos económicos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'economic_group-actualizar-grupo-economico',
                'alias' => 'Actualizar grupo economico',
                'description' => 'Actualizar un grupo economico por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup',
                'parent_name_translated' => 'grupos económicos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'economic_group-eliminar-grupo-economico',
                'alias' => 'Borrar grupo economico',
                'description' => 'Borrar un grupo economico por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup',
                'parent_name_translated' => 'grupos económicos',
                'module_group' => 'academic'
            ],
            /**
             * Tipos Discapacidad 150-151
             */
            [
                'name' => 'type_disability-listar-tipo-discapacidad',
                'alias' => 'Listar discapacidades',
                'description' => 'Listar todas las discapacidades',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDisability',
                'parent_name_translated' => 'tipos de discapacidad',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type_disability-obtener-tipo-discapacidad',
                'alias' => 'Obtener tipo discapacidad',
                'description' => 'Obtener un tipo de discapacidad por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDisability',
                'parent_name_translated' => 'tipos de discapacidad',
                'module_group' => 'academic'
            ],
            /**
             * Tipo sangre 152-153
             */
            [
                'name' => 'blood_type-listar-tipo-sangre',
                'alias' => 'Listar tipo sangre',
                'description' => 'Listar todos los tipos de sangre',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'bloodType',
                'parent_name_translated' => 'tipo de sangre',
                'module_group' => 'academic'
            ],
            [
                'name' => 'blood_type-obtener-tipo-sangre',
                'alias' => 'Obtener tipo sangre',
                'description' => 'Obtener un tipo de sangre por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'bloodType',
                'parent_name_translated' => 'tipo de sangre',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Educacion 154-155
             */
            [
                'name' => 'type_education-listar-tipo-educacion',
                'alias' => 'Listar tipo educacion',
                'description' => 'Listar todos los tipos de educacion',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeEducation',
                'parent_name_translated' => 'tipos de educación',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type_education-obtener-tipo-educacion',
                'alias' => 'Obtener tipo educacion',
                'description' => 'Obtener un tipo de educacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeEducation',
                'parent_name_translated' => 'tipos de educación',
                'module_group' => 'academic'
            ],
            /**
             * Persona Trabajo 156-161
             */
            [
                'name' => 'person_job-listar-persona-trabajo',
                'alias' => 'Listar persona trabajo',
                'description' => 'Listar todos los persona trabajos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob',
                'parent_name_translated' => 'trabajos por persona',
                'module_group' => 'academic'
            ],
            [
                'name' => 'person_job-obtener-persona-trabajo',
                'alias' => 'Obtener persona trabajo',
                'description' => 'Obtener un persona trabajo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob',
                'parent_name_translated' => 'trabajos por persona',
                'module_group' => 'academic'
            ],
            [
                'name' => 'person_job-crear-persona-trabajo',
                'alias' => 'Crear persona trabajo',
                'description' => 'Agregar un persona trabajo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob',
                'parent_name_translated' => 'trabajos por persona',
                'module_group' => 'academic'
            ],
            [
                'name' => 'persona-asignar-trabajos-persona',
                'alias' => 'asignar trabajos persona',
                'description' => 'Asignacion masiva de trabajos a una persona',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person',
                'parent_name_translated' => 'personas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'person_job-actualizar-persona-trabajo',
                'alias' => 'Actualizar persona trabajo',
                'description' => 'Actualizar un persona trabajo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob',
                'parent_name_translated' => 'trabajos por persona',
                'module_group' => 'academic'
            ],
            [
                'name' => 'person_job-eliminar-persona-trabajo',
                'alias' => 'Borrar persona trabajo',
                'description' => 'Borrar un persona trabajo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob',
                'parent_name_translated' => 'trabajos por persona',
                'module_group' => 'academic'
            ],
            /**
             * Tenant 162
             */
            [
                'name' => 'tenant-actualizar-tenant',
                'alias' => 'Actualizar tenant',
                'description' => 'Actualizar tenant',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tenant',
                'parent_name_translated' => 'inquilinos',
                'module_group' => 'academic'
            ],
            /**
             * Criterio Estudiante 163-167
             */
            [
                'name' => 'criteria_students_records-listar-criterio-record-estudiantil',
                'alias' => 'Listar criteria_student',
                'description' => 'Listar todos los criteria_student',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent',
                'parent_name_translated' => 'criterios del record estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'criteria_students_records-crear-criterio-record-estudiantil',
                'alias' => 'Obtener criteria_student',
                'description' => 'Obtener un criteria_student por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent',
                'parent_name_translated' => 'criterios del record estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'criteria_students_records-obtener-criterio-record-estudiantil',
                'alias' => 'Crear criteria_student',
                'description' => 'Agregar un criteria_student',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent',
                'parent_name_translated' => 'criterios del record estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'criteria_students_records-actualizar-criterio-record-estudiantil',
                'alias' => 'Actualizar criteria_student',
                'description' => 'Actualizar un criteria_student por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent',
                'parent_name_translated' => 'criterios del record estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'criteria_students_records-eliminar-criterio-record-estudiantil',
                'alias' => 'Borrar criteria_student',
                'description' => 'Borrar un criteria_student por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent',
                'parent_name_translated' => 'criterios del record estudiantil',
                'module_group' => 'academic'
            ],
            /**
             * Record Estudiantil 168-172
             */
            [
                'name' => 'student_records-listar-record-estudiantil',
                'alias' => 'Listar recodr estudiantil',
                'description' => 'Listar todos los record estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord',
                'parent_name_translated' => 'registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student_records-crear-record-estudiantil',
                'alias' => 'Obtener recodr estudiantil',
                'description' => 'Obtener un record estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord',
                'parent_name_translated' => 'registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student_records-obtener-record-estudiantil',
                'alias' => 'Crear recodr estudiantil',
                'description' => 'Agregar un record estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord',
                'parent_name_translated' => 'registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student_records-actualizar-record-estudiantil',
                'alias' => 'Actualizar recodr estudiantil',
                'description' => 'Actualizar un record estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord',
                'parent_name_translated' => 'registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student_records-eliminar-record-estudiantil',
                'alias' => 'Borrar record estudiantil',
                'description' => 'Borrar un record estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord',
                'parent_name_translated' => 'registro estudiantil',
                'module_group' => 'academic'
            ],
            /**
             * Oferta 173-174
             */
            [
                'name' => 'offers-listar-periodos-por-oferta',
                'alias' => 'Listar periodo oferta',
                'description' => 'Listar todos los periodos por oferta',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'período por oferta',
                'module_group' => 'academic'
            ],
            [
                'name' => 'offers-obtener-periodo-por-oferta',
                'alias' => 'Obtener periodo oferta',
                'description' => 'Obtener un periodo oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'período por oferta',
                'module_group' => 'academic'
            ],
            /**
             * Periodo 175-176
             */
            [
                'name' => 'periods-listar-ofertas-por-periodo',
                'alias' => 'Listar oferta periodo',
                'description' => 'Listar todas las ofertas por periodos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'ofertas por período',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periods-borrar-ofertas-por-periodo',
                'alias' => 'eliminar oferta periodo',
                'description' => 'borrar una oferta periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'ofertas por período',
                'module_group' => 'academic'
            ],
            /**
             * Persona 177-181
             */
            [
                'name' => 'persons-listar-persons',
                'alias' => 'Listar persona',
                'description' => 'Listar todas las personas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person',
                'parent_name_translated' => 'personas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'persons-obtener-person',
                'alias' => 'Obtener persona',
                'description' => 'Obtener una persona por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person',
                'parent_name_translated' => 'personas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'persons-crear-person',
                'alias' => 'Crear persona',
                'description' => 'Agregar una persona',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person',
                'parent_name_translated' => 'personas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'persons-actualizar-person',
                'alias' => 'Actualizar persona',
                'description' => 'Actualizar una persona por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person',
                'parent_name_translated' => 'personas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'persons-borrar-person',
                'alias' => 'Borrar persona',
                'description' => 'Borrar una persona por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person',
                'parent_name_translated' => 'personas',
                'module_group' => 'academic'
            ],
            /**
             * Contacto Emergencia 182-186
             */
            [
                'name' => 'emergency_contact-listar-contacto-emergencia',
                'alias' => 'Listar contactos emergencia',
                'description' => 'Listar todos los contactos de emergencia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact',
                'parent_name_translated' => 'contactos de emergencia',
                'module_group' => 'academic'
            ],
            [
                'name' => 'emergency_contact-obtener-contacto-emergencia',
                'alias' => 'Obtener contacto emergencia',
                'description' => 'Obtener un contacto de emergencia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact',
                'parent_name_translated' => 'contactos de emergencia',
                'module_group' => 'academic'
            ],
            [
                'name' => 'emergency_contact-crear-contacto-emergencia',
                'alias' => 'Crear contacto emergencia',
                'description' => 'Agregar un contacto de emergencia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact',
                'parent_name_translated' => 'contactos de emergencia',
                'module_group' => 'academic'
            ],
            [
                'name' => 'emergency_contact-actualizar-contacto-emergencia',
                'alias' => 'Actualizar contacto de emergencia',
                'description' => 'Actualizar un contacto de emergencia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact',
                'parent_name_translated' => 'contactos de emergencia',
                'module_group' => 'academic'
            ],
            [
                'name' => 'emergency_contact-eliminar-contacto-emergencia',
                'alias' => 'Borrar contacto emergencia',
                'description' => 'Borrar un contacto de emergencia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact',
                'parent_name_translated' => 'contactos de emergencia',
                'module_group' => 'academic'
            ],
            /**
             * Periodos 187-188
             */
            [
                'name' => 'periods-listar-horarios-por-periodo',
                'alias' => 'Listar horarios periodo',
                'description' => 'Listar todos los horarios por periodos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'períodos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periods-borrar-horarios-por-periodo',
                'alias' => 'Borrar horario periodo',
                'description' => 'Borrar un horario periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'períodos',
                'module_group' => 'academic'
            ],
            /**
             * Etiqueta Estudiante 189-193
             */
            [
                'name' => 'tags_student-listar-etiqueta',
                'alias' => 'Listar etiqueta estudiante',
                'description' => 'Listar todas las etiquetas de estudiantes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent',
                'parent_name_translated' => 'etiquetas del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'tags_student-obtener-etiqueta',
                'alias' => 'Obtener etiqueta estudiante',
                'description' => 'Obtener una etiqueta estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent',
                'parent_name_translated' => 'etiquetas del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'tags_student-crear-etiqueta',
                'alias' => 'Crear etiqueta estudiante',
                'description' => 'Agregar una etiqueta de estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent',
                'parent_name_translated' => 'etiquetas del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'tags_student-actualizar-etiqueta',
                'alias' => 'Actualizar etiqueta estudiante',
                'description' => 'Actualizar una etiqueta estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent',
                'parent_name_translated' => 'etiquetas del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'tags_student-eliminar-etiqueta',
                'alias' => 'Borrar etiqueta estudiante',
                'description' => 'Borrar una etiqueta estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent',
                'parent_name_translated' => 'etiquetas del estudiante',
                'module_group' => 'academic'
            ],
            /**
             * Persona 194
             */
            [
                'name' => 'languages-person-actualizar-lenguajes-por-persona',
                'alias' => 'Actualizar lenguaje persona',
                'description' => 'Actualizar el lenguaje de la persona por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person',
                'parent_name_translated' => 'personas',
                'module_group' => 'academic'
            ],
            /**
             * Catalogar 195-199
             */
            [
                'name' => 'catalogs-listar-catalogs',
                'alias' => 'Listar catalogo',
                'description' => 'Listar todo el catalogo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog',
                'parent_name_translated' => 'catálogos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'catalogs-obtener-catalog',
                'alias' => 'Obtener catalogo',
                'description' => 'Obtener un catalogo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog',
                'parent_name_translated' => 'catálogos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'catalogs-crear-catalog',
                'alias' => 'Crear catalogo',
                'description' => 'Agregar un catalogo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog',
                'parent_name_translated' => 'catálogos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'catalogs-actualizar-catalog',
                'alias' => 'Actualizar catalogo',
                'description' => 'Actualizar un catalogo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog',
                'parent_name_translated' => 'catálogos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'catalogs-borrar-catalog',
                'alias' => 'Borrar catalogo',
                'description' => 'Borrar un catalogo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog',
                'parent_name_translated' => 'catálogos',
                'module_group' => 'academic'
            ],

        ]);

        DB::connection('tenant')->table('permissions')->insert([

            /**
             * Documentos Estudiante 200-205
             */
            [
                'name' => 'student-document-listar-documentos-estudiantes',
                'alias' => 'Listar documento estudiante',
                'description' => 'Listar todos los documento estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument',
                'parent_name_translated' => 'documentos del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-document-obtener-documento-estudiante',
                'alias' => 'Obtener documento estudiante',
                'description' => 'Obtener un documento estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument',
                'parent_name_translated' => 'documentos del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-document-crear-documento-estudiante',
                'alias' => 'Crear documento estudiante',
                'description' => 'Agregar un documento estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument',
                'parent_name_translated' => 'documentos del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-document-actualizar-documento-estudiante',
                'alias' => 'Actualizar documento estudiante',
                'description' => 'Actualizar un documento estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument',
                'parent_name_translated' => 'documentos del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-document-borrar-documento-estudiante',
                'alias' => 'Borrar documento estudiante',
                'description' => 'Borrar un documento estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument',
                'parent_name_translated' => 'documentos del estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-document-descargar-documentos-estudiantes',
                'alias' => 'Descargar documento estudiante',
                'description' => 'Descargar un documento estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument',
                'parent_name_translated' => 'documentos del estudiante',
                'module_group' => 'academic'
            ],
            /**
             * Estados 206
             */
            [
                'name' => 'status-listar-status',
                'alias' => 'Listado de estados',
                'description' => 'Listar todos los estados',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'status',
                'parent_name_translated' => 'estados',
                'module_group' => 'academic'
            ],
            /**
             * Mencion 207-208
             */
            [
                'name' => 'mention-listar-menciones',
                'alias' => 'Listar menciones',
                'description' => 'Listar todas las menciones',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mention',
                'parent_name_translated' => 'menciones',
                'module_group' => 'academic'
            ],
            [
                'name' => 'mention-obtener-mencion',
                'alias' => 'Obtener mencion',
                'description' => 'Obtener una mencion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mention',
                'parent_name_translated' => 'menciones',
                'module_group' => 'academic'
            ],
            /**
             * Tipo progama estudiante 209-213
             */
            [
                'name' => 'type-student-program-listar-tipo-programa-estudiante',
                'alias' => 'Listar tipos programa estudiante',
                'description' => 'Listar todos los tipo de programa del estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram',
                'parent_name_translated' => 'tipo de programa para estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-student-program-obtener-tipo-programa-estudiante',
                'alias' => 'Obtener tipo programa estudiante',
                'description' => 'Obtener un tipo de programa del estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram',
                'parent_name_translated' => 'tipo de programa para estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-student-program-crear-tipo-programa-estudiante',
                'alias' => 'Crear tipo programa estudiante',
                'description' => 'Agregar un tipo de programa del estudiante estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram',
                'parent_name_translated' => 'tipo de programa para estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-student-program-actualizar-tipo-programa-estudiante',
                'alias' => 'Actualizar tipo programa estudiante',
                'description' => 'Actualizar un tipo de programa del estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram',
                'parent_name_translated' => 'tipo de programa para estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-student-program-borrar-tipo-programa-estudiante',
                'alias' => 'Borrar tipo programa estudiante',
                'description' => 'Borrar un tipo de programa del estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram',
                'parent_name_translated' => 'tipo de programa para estudiante',
                'module_group' => 'academic'
            ],
            /**
             * Familia 214-219
             */
            [
                'name' => 'relatives-listar-familiar',
                'alias' => 'Listar familiar',
                'description' => 'Listar todos los familiares',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives',
                'parent_name_translated' => 'familiares',
                'module_group' => 'academic'
            ],
            [
                'name' => 'relatives-obtener-familiar',
                'alias' => 'Obtener familiar',
                'description' => 'Obtener un familiar por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives',
                'parent_name_translated' => 'familiares',
                'module_group' => 'academic'
            ],
            [
                'name' => 'relatives-crear-familiar',
                'alias' => 'Crear familiar',
                'description' => 'Agregar un familiar',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives',
                'parent_name_translated' => 'familiares',
                'module_group' => 'academic'
            ],
            [
                'name' => 'relatives-actualizar-familiar',
                'alias' => 'Actualizar familiar',
                'description' => 'Actualizar un familiar por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives',
                'parent_name_translated' => 'familiares',
                'module_group' => 'academic'
            ],
            [
                'name' => 'relatives-borrar-familiar',
                'alias' => 'Borrar familiar',
                'description' => 'Borrar un familiar por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives',
                'parent_name_translated' => 'familiares',
                'module_group' => 'academic'
            ],
            [
                'name' => 'relatives-obtener-familiar-por-estudiante',
                'alias' => 'Obtener familiar estudiante',
                'description' => 'Obtener un familiar por estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives',
                'parent_name_translated' => 'familiares',
                'module_group' => 'academic'
            ],
            /**
             * Categoria Estados 220
             */
            [
                'name' => 'category-status-listar-categoria-estado',
                'alias' => 'Listado de categoria estados',
                'description' => 'Listar todas las categorias de estados',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'categoryStatus',
                'parent_name_translated' => 'estados de categoría',
                'module_group' => 'academic'
            ],
            /**
             * Estudiantes 221-224
             */
            [
                'name' => 'student-show-estudiante',
                'alias' => 'Obtener estudiante',
                'description' => 'Obtener un estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student',
                'parent_name_translated' => 'estudiantes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-crear-estudiante',
                'alias' => 'Crear estudiante',
                'description' => 'Crear un estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student',
                'parent_name_translated' => 'estudiantes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-update-estudiante',
                'alias' => 'Actualizar estudiante',
                'description' => 'Actualizar un estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student',
                'parent_name_translated' => 'estudiantes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-delete-estudiante',
                'alias' => 'Eliminar estudiante',
                'description' => 'Eliminar un estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student',
                'parent_name_translated' => 'estudiantes',
                'module_group' => 'academic'
            ],
            /**
             * Materia Malla 225-226
             */
            [
                'name' => 'mattermesh-asignar-dependencias-por-materias-mallas',
                'alias' => 'asignar dependencia materia malla',
                'description' => 'Asignar dependecias de materias por mallas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'materias por malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'mattermesh-listar-dependencias-por-materias-mallas',
                'alias' => 'listar dependencia materia malla',
                'description' => 'Lista todas las dependecias de materias por mallas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'materias por malla',
                'module_group' => 'academic'
            ],
            /**
             * Persona 227
             */
            [
                'name' => 'person-as-student-configurar-persona-como-estudiante',
                'alias' => 'Configurar persona estudiante',
                'description' => 'Configura una persona como un estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person',
                'parent_name_translated' => 'personas',
                'module_group' => 'academic'
            ],
            /**
             * Materia Malla 228
             */
            [
                'name' => 'matters-by-meshs-obtener-materias-por-malla',
                'alias' => 'Obtener materia por malla',
                'description' => 'Obtener todas las materias por el identificador de su malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'mallas',
                'module_group' => 'academic'
            ],
            /**
             * Simbology 229-233
             */
            [
                'name' => 'simbology-listar-simbologias',
                'alias' => 'Listar simbologias',
                'description' => 'Listar todas las simbologias',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology',
                'parent_name_translated' => 'simbologias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'simbology-obtener-simbologia',
                'alias' => 'Obtener simbologia',
                'description' => 'Obtener una simbologia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology',
                'parent_name_translated' => 'simbologias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'simbology-crear-simbologia',
                'alias' => 'Crear simbologia',
                'description' => 'Agregar una simbologia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology',
                'parent_name_translated' => 'simbologias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'simbology-actualizar-simbologia',
                'alias' => 'Actualizar simbologia',
                'description' => 'Actualizar una simbologia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology',
                'parent_name_translated' => 'simbologias',
                'module_group' => 'academic'
            ],
            [
                'name' => 'simbology-eliminar-simbologia',
                'alias' => 'Borrar simbologia',
                'description' => 'Borrar una simbologia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology',
                'parent_name_translated' => 'simbologias',
                'module_group' => 'academic'
            ],
            /**
             * Simbologia Oferta 234-235
             */
            [
                'name' => 'offers-listar-simbologias-por-oferta',
                'alias' => 'Listar simbologias oferta',
                'description' => 'Listar todas las simbologias por ofertas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'ofertas académicas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'offers-asignar-simbologias-por-oferta',
                'alias' => 'Asignar simbologia oferta',
                'description' => 'Asignacion masiva de simbologia a la oferta',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers',
                'parent_name_translated' => 'ofertas académicas',
                'module_group' => 'academic'
            ],
            /**
             * Record de Programa Estudiantil 236-241
             */
            [
                'name' => 'student-record-programs-listar-programas-registro-estudiantil',
                'alias' => 'Listar student-records-programs',
                'description' => 'Listar todos los records de programa estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms',
                'parent_name_translated' => 'programas de registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-record-programs-obtener-programa-registro-estudiantil',
                'alias' => 'Obtener student-record-programs',
                'description' => 'Obtener un record de programa estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms',
                'parent_name_translated' => 'programas de registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-record-programs-crear-programa-registro-estudiantil',
                'alias' => 'Crear student-record-programs',
                'description' => 'Agregar un record de programa estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms',
                'parent_name_translated' => 'programas de registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-record-programs-actualizar-programa-registro-estudiantil',
                'alias' => 'Actualizar student-record-programs',
                'description' => 'Actualizar un record de programa estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms',
                'parent_name_translated' => 'programas de registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-record-programs-borrar-programa-registro-estudiantil',
                'alias' => 'Borrar student-record-programs',
                'description' => 'Borrar un record de programa estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms',
                'parent_name_translated' => 'programas de registro estudiantil',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-records-and-type-student-programs-listar-programa-registro-estudiantil-asociado-record-estudiante',
                'alias' => 'listar student-record-programs-registro-estudiantil',
                'description' => 'Listar todos los record de programa estudiantil y registros asociados',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecord',
                'parent_name_translated' => 'registro estudiantil',
                'module_group' => 'academic'
            ],
            /**
             * Record de Periodo Estudiantil 242-246
             */
            [
                'name' => 'student-records-period-listar-student-records-period',
                'alias' => 'Listar student-records-period',
                'description' => 'Listar todos los records de periodo estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod',
                'parent_name_translated' => 'registros de estudiantes por período',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-records-period-obtener-student-record-period',
                'alias' => 'Obtener student-record-period',
                'description' => 'Obtener un record de periodo estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod',
                'parent_name_translated' => 'registros de estudiantes por período',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-records-period-crear-student-record-period',
                'alias' => 'Crear student-record-period',
                'description' => 'Agregar un record de periodo estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod',
                'parent_name_translated' => 'registros de estudiantes por período',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-records-period-actualizar-student-record-period',
                'alias' => 'Actualizar student-record-period',
                'description' => 'Actualizar un record de periodo estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod',
                'parent_name_translated' => 'registros de estudiantes por período',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-records-period-borrar-student-record-period',
                'alias' => 'Borrar student-record-period',
                'description' => 'Borrar un record de periodo estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod',
                'parent_name_translated' => 'registros de estudiantes por período',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Aulas 247-251
             */
            [
                'name' => 'classroomType-listar-tipos-de-aulas',
                'alias' => 'Listar tipos aulas',
                'description' => 'Listar todos los tipos de aulas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType',
                'parent_name_translated' => 'tipos de aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classroomType-obtener-tipo-aula',
                'alias' => 'Obtener tipo aula',
                'description' => 'Obtener un tipo de aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType',
                'parent_name_translated' => 'tipos de aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classroomType-crear-tipo-aula',
                'alias' => 'Crear tipo aula',
                'description' => 'Agregar un nuevo tipo de aula',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType',
                'parent_name_translated' => 'tipos de aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classroomType-actualizar-tipo-aula',
                'alias' => 'Actualizar tipo aula',
                'description' => 'Actualizar un tipo de aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType',
                'parent_name_translated' => 'tipos de aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classroomType-eliminar-tipo-aula',
                'alias' => 'Borrar tipo aula',
                'description' => 'Borrar un tipo de aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType',
                'parent_name_translated' => 'tipos de aulas',
                'module_group' => 'academic'
            ],
            /**
             * Estudiante 252-253
             */
            [
                'name' => 'student-listar-estudiante',
                'alias' => 'Listar estudiantes',
                'description' => 'Listar todos los estudiantes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student',
                'parent_name_translated' => 'estudiantes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'student-update-photo-estudiante',
                'alias' => 'Actualizar foto estudiante',
                'description' => 'Actualizar una foto de un estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student',
                'parent_name_translated' => 'estudiantes',
                'module_group' => 'academic'
            ],
            /**
             * Cargo 254-260
             */
            [
                'name' => 'positions-listar-cargos',
                'alias' => 'Listar cargos',
                'description' => 'Listar todos los cargos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position',
                'parent_name_translated' => 'cargos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'positions-obtener-cargo',
                'alias' => 'Obtener cargo',
                'description' => 'Obtener un cargo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position',
                'parent_name_translated' => 'cargos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'positions-crear-cargo',
                'alias' => 'Crear cargo',
                'description' => 'Agregar un cargo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position',
                'parent_name_translated' => 'cargos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'positions-actualizar-cargo',
                'alias' => 'Actualizar cargo',
                'description' => 'Actualizar un cargo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position',
                'parent_name_translated' => 'cargos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'positions-eliminar-cargo',
                'alias' => 'Borrar cargo',
                'description' => 'Borrar un cargo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position',
                'parent_name_translated' => 'cargos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-listar-usuarios',
                'alias' => 'Listar usuarios',
                'description' => 'Listar todos los usuarios',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'users-obtener-usuario',
                'alias' => 'Obtener un usuario',
                'description' => 'Obtener un usuario por id',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users',
                'parent_name_translated' => 'usuarios',
                'module_group' => 'academic'
            ],
            /**
             * Componente 261-265
             */
            [
                'name' => 'components-listar-componente',
                'alias' => 'Listar componente',
                'description' => 'Listar todos los componentes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            [
                'name' => 'components-obtener-componente',
                'alias' => 'Obtener componente',
                'description' => 'Obtener un componente por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            [
                'name' => 'components-crear-componente',
                'alias' => 'Crear componente',
                'description' => 'Agregar un componente',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            [
                'name' => 'components-actualizar-componente',
                'alias' => 'Actualizar componente',
                'description' => 'Actualizar un componente por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            [
                'name' => 'components-borrar-componente',
                'alias' => 'Borrar componente',
                'description' => 'Borrar un componente por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            /**
             * Detalle Materia Malla 266-270
             */
            [
                'name' => 'details_matter_mesh-listar-detalle-materiamalla',
                'alias' => 'Listar detalle materia malla',
                'description' => 'Listar todos los detalle materia mallas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh',
                'parent_name_translated' => 'detalles de materias malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'details_matter_mesh-obtener-detalle-materiamalla',
                'alias' => 'Obtener detalle materia malla',
                'description' => 'Obtener un detalle materia malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh',
                'parent_name_translated' => 'detalles de materias malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'details_matter_mesh-crear-detalle-materiamalla',
                'alias' => 'Crear detalle materia malla',
                'description' => 'Agregar un detalle materia malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh',
                'parent_name_translated' => 'detalles de materias malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'details_matter_mesh-actualizar-detalle-materiamalla',
                'alias' => 'Actualizar detalle materia malla',
                'description' => 'Actualizar un detalle materia malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh',
                'parent_name_translated' => 'detalles de materias malla',
                'module_group' => 'academic'
            ],
            [
                'name' => 'details_matter_mesh-borrar-detalle-materiamalla',
                'alias' => 'Borrar detalle materia malla',
                'description' => 'Borrar un detalle materia malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh',
                'parent_name_translated' => 'detalles de materias malla',
                'module_group' => 'academic'
            ],

            /**
             * Componente Aprendizaje 271-275
             */
            [
                'name' => 'learning_components-listar-componente-aprendizaje',
                'alias' => 'Listar componente aprendizaje',
                'description' => 'Listar todos los componente aprendizajes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            [
                'name' => 'learning_components-obtener-componente-aprendizaje',
                'alias' => 'Obtener componente aprendizaje',
                'description' => 'Obtener un componente aprendizaje por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            [
                'name' => 'learning_components-crear-componente-aprendizaje',
                'alias' => 'Crear componente aprendizaje',
                'description' => 'Agregar un componente aprendizaje',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            [
                'name' => 'learning_components-actualizar-componente-aprendizaje',
                'alias' => 'Actualizar componente aprendizaje',
                'description' => 'Actualizar un componente aprendizaje por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            [
                'name' => 'learning_components-borrar-componente-aprendizaje',
                'alias' => 'Borrar componente aprendizaje',
                'description' => 'Borrar un componente aprendizaje por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent',
                'parent_name_translated' => 'componentes de aprendizaje',
                'module_group' => 'academic'
            ],
            /**
             * Modelo Calificacion 276-280
             */
            [
                'name' => 'calification-models-listar-modelo-calificacion',
                'alias' => 'Listar modelo calificacion',
                'description' => 'Listar todos los modelo calificacion',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'calificationModel',
                'parent_name_translated' => 'modelo de califición',
                'module_group' => 'academic'
            ],
            [
                'name' => 'calification-models-obtener-modelo-calificacion',
                'alias' => 'Obtener modelo calificacion',
                'description' => 'Obtener un modelo calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'calificationModel',
                'parent_name_translated' => 'modelo de califición',
                'module_group' => 'academic'
            ],
            [
                'name' => 'calification-models-crear-modelo-calificacion',
                'alias' => 'Crear modelo calificacion',
                'description' => 'Agregar un modelo calificacion',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'calificationModel',
                'parent_name_translated' => 'modelo de califición',
                'module_group' => 'academic'
            ],
            [
                'name' => 'calification-models-actualizar-modelo-calificacion',
                'alias' => 'Actualizar modelo calificacion',
                'description' => 'Actualizar un modelo calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'calificationModel',
                'parent_name_translated' => 'modelo de califición',
                'module_group' => 'academic'
            ],
            [
                'name' => 'calification-models-borrar-modelo-calificacion',
                'alias' => 'Borrar modelo calificacion',
                'description' => 'Borrar un modelo calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'calificationModel',
                'parent_name_translated' => 'modelo de califición',
                'module_group' => 'academic'
            ],
            /**
             * Convenios 281-286
             */
            [
                'name' => 'agreement-listar-convenios',
                'alias' => 'Listar convenios',
                'description' => 'Listar todos los convenios',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'agreement',
                'parent_name_translated' => 'convenios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'agreement-obtener-convenio',
                'alias' => 'Obtener convenio',
                'description' => 'Obtener un convenio por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'agreement',
                'parent_name_translated' => 'convenios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'agreement-crear-convenio',
                'alias' => 'Crear convenio',
                'description' => 'Agregar un convenio',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'agreement',
                'parent_name_translated' => 'convenios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'agreement-actualizar-convenio',
                'alias' => 'Actualizar convenio',
                'description' => 'Actualizar un convenio por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'agreement',
                'parent_name_translated' => 'convenios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'agreement-activar-convenio',
                'alias' => 'Activar convenio',
                'description' => 'Activar un convenio por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'agreement',
                'parent_name_translated' => 'convenios',
                'module_group' => 'academic'
            ],
            [
                'name' => 'agreement-desactivar-convenio',
                'alias' => 'Desactivar convenio',
                'description' => 'Desactivar un convenio por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'agreement',
                'parent_name_translated' => 'convenios',
                'module_group' => 'academic'
            ],
            /**
             * Areas 287-291
             */
            [
                'name' => 'areas-listar-areas',
                'alias' => 'Listar areas',
                'description' => 'Listar todos los areas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'area',
                'parent_name_translated' => 'áreas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'areas-obtener-area',
                'alias' => 'Obtener area',
                'description' => 'Obtener un area por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'area',
                'parent_name_translated' => 'áreas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'areas-crear-area',
                'alias' => 'Crear area',
                'description' => 'Agregar un area',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'area',
                'parent_name_translated' => 'áreas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'areas-actualizar-area',
                'alias' => 'Actualizar area',
                'description' => 'Actualizar un area por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'area',
                'parent_name_translated' => 'áreas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'areas-borrar-area',
                'alias' => 'Borrar area',
                'description' => 'Eliminar un area por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'area',
                'parent_name_translated' => 'áreas',
                'module_group' => 'academic'
            ],
            /**
             * Departamentos 292-296
             */
            [
                'name' => 'departments-listar-departamentos',
                'alias' => 'Listar departamentos',
                'description' => 'Listar todos los departamentos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'department',
                'parent_name_translated' => 'departamentos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'departments-obtener-departamento',
                'alias' => 'Obtener departamento',
                'description' => 'Obtener un departamento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'department',
                'parent_name_translated' => 'departamentos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'departments-crear-departamento',
                'alias' => 'Crear departamento',
                'description' => 'Agregar un departamento',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'department',
                'parent_name_translated' => 'departamentos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'departments-actualizar-departamento',
                'alias' => 'Actualizar departamento',
                'description' => 'Actualizar un departamento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'department',
                'parent_name_translated' => 'departamentos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'departments-actualizar-estado-departamento',
                'alias' => 'Actualizar estado departamento',
                'description' => 'Actualiza el estado de un departamento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'department',
                'parent_name_translated' => 'departamentos',
                'module_group' => 'academic'
            ],
        ]);

        DB::connection('tenant')->table('permissions')->insert([
            /**
             * Colaboradores 297-298
             */
            [
                'name' => 'collaborators-obtener-colaborador',
                'alias' => 'Obtener colaborador',
                'description' => 'Obtener un colaborador por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaborator',
                'parent_name_translated' => 'colaboradores',
                'module_group' => 'academic'
            ],
            [
                'name' => 'collaborators-crear-colaborador',
                'alias' => 'Crear colaborador',
                'description' => 'Agregar un colaborador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaborator',
                'parent_name_translated' => 'colaboradores',
                'module_group' => 'academic'
            ],
            /**
             * Nivel Educativo Aula 299-303
             */
            [
                'name' => 'classroom_education_levels-listar-aula-niveleconomico',
                'alias' => 'Listar niveles educativos aulas',
                'description' => 'Listar todos los niveles educativos aulas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomEducationLevel',
                'parent_name_translated' => 'niveles educativos de aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classroom_education_levels-obtener-aula-niveleconomico',
                'alias' => 'Obtener nivel educativo aula',
                'description' => 'Obtener un nivel educativo aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomEducationLevel',
                'parent_name_translated' => 'niveles educativos de aulas',

                'module_group' => 'academic'
            ],
            [
                'name' => 'classroom_education_levels-crear-aula-niveleconomico',
                'alias' => 'Crear nivel educativo aula',
                'description' => 'Agregar un nivel educativo aula',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomEducationLevel',
                'parent_name_translated' => 'niveles educativos de aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classroom_education_levels-actualizar-aula-niveleconomico',
                'alias' => 'Actualizar nivel educativo aula',
                'description' => 'Actualizar un nivel educativo aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomEducationLevel',
                'parent_name_translated' => 'niveles educativos de aulas',
                'module_group' => 'academic'
            ],
            [
                'name' => 'classroom_education_levels-borrar-aula-niveleconomico',
                'alias' => 'Borrar estado nivel educativo aula',
                'description' => 'Elimina el estado de un nivel educativo aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomEducationLevel',
                'parent_name_translated' => 'niveles educativos de aulas',
                'module_group' => 'academic'
            ],
            /**
             * Actualizar Foto Estudiante 304
             */
            [
                'name' => 'users-actualizar-foto-por-estudiante',
                'alias' => 'actualizar foto estudiante',
                'description' => 'Actualiza la foto de un estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student',
                'parent_name_translated' => 'estudiantes',
                'module_group' => 'academic'
            ],
            /**
             * Horas Colaborador 305-309
             */
            [
                'name' => 'collaborator-hours-listar-horas-colaborador',
                'alias' => 'Listar horas colaborador',
                'description' => 'Listar todas las horas colaborador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaboratorHours',
                'parent_name_translated' => 'horas de colaborador',
                'module_group' => 'academic'
            ],
            [
                'name' => 'collaborator-hours-obtener-hora-colaborador',
                'alias' => 'Obtener hora colaborador',
                'description' => 'Obtener una hora colaborador por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaboratorHours',
                'parent_name_translated' => 'horas de colaborador',
                'module_group' => 'academic'
            ],
            [
                'name' => 'collaborator-hours-crear-hora-colaborador',
                'alias' => 'Crear hora colaborador',
                'description' => 'Agregar una hora colaborador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaboratorHours',
                'parent_name_translated' => 'horas de colaborador',
                'module_group' => 'academic'
            ],
            [
                'name' => 'collaborator-hours-actualizar-hora-colaborador',
                'alias' => 'Actualizar hora colaborador',
                'description' => 'Actualizar una hora colaborador por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaboratorHours',
                'parent_name_translated' => 'horas de colaborador',
                'module_group' => 'academic'
            ],
            [
                'name' => 'collaborator-hours-borrar-hora-colaborador',
                'alias' => 'Borrar hora colaborador',
                'description' => 'Eliminar una hora colaborador por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaboratorHours',
                'parent_name_translated' => 'horas de colaborador',
                'module_group' => 'academic'
            ],
            /**
             * Resumen Horas 310-314
             */
            [
                'name' => 'hours-summaries-listar-resumen-horas-colaborador',
                'alias' => 'Listar resumen horas colaborador',
                'description' => 'Listar todos los resumenes horas colaborador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourSummary',
                'parent_name_translated' => 'resumen de horas del colaborador',
                'module_group' => 'academic'
            ],
            [
                'name' => 'hours-summaries-obtener-resumen-horas-colaborador',
                'alias' => 'Obtener resumen horas colaborador',
                'description' => 'Obtener un resumen horas colaborador por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourSummary',
                'parent_name_translated' => 'resumen de horas del colaborador',
                'module_group' => 'academic'
            ],
            [
                'name' => 'hours-summaries-crear-resumen-horas-colaborador',
                'alias' => 'Crear resumen horas colaborador',
                'description' => 'Agregar un resumen horas colaborador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourSummary',
                'parent_name_translated' => 'resumen de horas del colaborador',
                'module_group' => 'academic'
            ],
            [
                'name' => 'hours-summaries-actualizar-resumen-horas-colaborador',
                'alias' => 'Actualizar resumen horas colaborador',
                'description' => 'Actualizar un resumen horas colaborador por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourSummary',
                'parent_name_translated' => 'resumen de horas del colaborador',
                'module_group' => 'academic'
            ],
            [
                'name' => 'hours-summaries-borrar-resumen-horas-colaborador',
                'alias' => 'Borrar resumen horas colaborador',
                'description' => 'Eliminar un resumen horas colaborador por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourSummary',
                'parent_name_translated' => 'resumen de horas del colaborador',
                'module_group' => 'academic'
            ],
            /**
             * Colaboradores 315-317
             */
            [
                'name' => 'collaborators-listar-colaborador',
                'alias' => 'Listar colaborador',
                'description' => 'Listar todos los colaboradores',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaborator',
                'parent_name_translated' => 'colaboradores',
                'module_group' => 'academic'
            ],
            [
                'name' => 'collaborators-actualizar-colaborador',
                'alias' => 'Actualizar colaborador',
                'description' => 'Actualiza un colaborador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaborator',
                'parent_name_translated' => 'colaboradores',
                'module_group' => 'academic'
            ],
            [
                'name' => 'collaborators-eliminar-colaborador',
                'alias' => 'Eliminar colaborador',
                'description' => 'Elimina un colaborador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'collaborator',
                'parent_name_translated' => 'colaboradores',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Reportes 318-322
             */
            [
                'name' => 'type-reports-listar-type-reports',
                'alias' => 'Listar tipos de reportes',
                'description' => 'Listar todos los departamentos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeReport',
                'parent_name_translated' => 'tipos de reportes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-reports-obtener-type-report',
                'alias' => 'Obtener tipo reporte',
                'description' => 'Obtener un tipo reporte por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeReport',
                'parent_name_translated' => 'tipos de reportes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-reports-crear-type-report',
                'alias' => 'Crear tipo reporte',
                'description' => 'Agregar un tipo reporte',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeReport',
                'parent_name_translated' => 'tipos de reportes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-reports-actualizar-type-report',
                'alias' => 'Actualizar tipo reporte',
                'description' => 'Actualizar un tipo reporte por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeReport',
                'parent_name_translated' => 'tipos de reportes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-reports-borrar-type-report',
                'alias' => 'Eliminar tipo reporte',
                'description' => 'Eliminar tipo reporte por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeReport',
                'parent_name_translated' => 'tipos de reportes',
                'module_group' => 'academic'
            ],
            /**
             * Permisos 323
             */
            [
                'name' => 'permissions-listar-permisos-traducidos',
                'alias' => 'Listar permisos traducidos',
                'description' => 'Lista todos los permisos traducidos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions',
                'parent_name_translated' => 'permisos',
                'module_group' => 'configuration'
            ],
            /**
             * Cursos 324-328
             */
            [
                'name' => 'courses-listar-curso',
                'alias' => 'Listar cursos',
                'description' => 'Listar todos los cursos',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'course',
                'parent_name_translated' => 'cursos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'courses-obtener-curso',
                'alias' => 'Obtener curso',
                'description' => 'Obtener un curso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'course',
                'parent_name_translated' => 'cursos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'courses-crear-curso',
                'alias' => 'Crear curso',
                'description' => 'Agregar un curso',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'course',
                'parent_name_translated' => 'cursos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'courses-actualizar-curso',
                'alias' => 'Actualizar curso',
                'description' => 'Actualizar un curso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'course',
                'parent_name_translated' => 'cursos',
                'module_group' => 'academic'
            ],
            [
                'name' => 'courses-borrar-curso',
                'alias' => 'Eliminar curso',
                'description' => 'Eliminar curso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'course',
                'parent_name_translated' => 'cursos',
                'module_group' => 'academic'
            ],
            /**
             * Nivel Carrera Materia 329-333
             */
            [
                'name' => 'education-level-subject-listar-materias-tipo-nivelacion-de-carreras',
                'alias' => 'Listar materias tipo nivelacion de carreras',
                'description' => 'Listar todas las materias tipo nivelacion de carreras',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevelSubject',
                'parent_name_translated' => 'materias tipo nivelacion de carreras',
                'module_group' => 'academic'
            ],
            [
                'name' => 'education-level-subject-obtener-materias-tipo-nivelacion-de-carrera',
                'alias' => 'Obtener materias tipo nivelacion de carreras',
                'description' => 'Obtener un materias tipo nivelacion de carreras por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevelSubject',
                'parent_name_translated' => 'materias tipo nivelacion de carreras',
                'module_group' => 'academic'
            ],
            [
                'name' => 'education-level-subject-asignar-materias-tipo-nivelacion-a-carrera',
                'alias' => 'Crear materias tipo nivelacion de carreras',
                'description' => 'Agregar un materias tipo nivelacion de carreras',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevelSubject',
                'parent_name_translated' => 'materias tipo nivelacion de carreras',
                'module_group' => 'academic'
            ],
            [
                'name' => 'education-level-subject-actualizar-materias-tipo-nivelacion-a-carrera',
                'alias' => 'Actualizar materias tipo nivelacion de carreras',
                'description' => 'Actualizar un materias tipo nivelacion de carreras por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevelSubject',
                'parent_name_translated' => 'materias tipo nivelacion de carreras',
                'module_group' => 'academic'
            ],
            [
                'name' => 'education-level-subject-eliminar-materias-tipo-nivelacion-a-carrera',
                'alias' => 'Eliminar materias tipo nivelacion de carreras',
                'description' => 'Eliminar materias tipo nivelacion de carreras por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevelSubject',
                'parent_name_translated' => 'materias tipo nivelacion de carreras',
                'module_group' => 'academic'
            ],
            /**
             * Periodo 334
             */
            [
                'name' => 'periods-aulas-asociadas-a-facultades-por-periodos',
                'alias' => 'Listar facultades por periodo',
                'description' => 'Listar todas las facultades por periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'periodos',
                'module_group' => 'academic'
            ],
            /**
             * Campus 335
             */
            [
                'name' => 'campus-obtener-aulas-filtradas-sedes',
                'alias' => 'Listar aulas filtradas sedes',
                'description' => 'Listar todas las aulas filtradas por sede',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus',
                'parent_name_translated' => 'campus',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Solicitudes 336-341
             */
            [
                'name' => 'type-application-listar-tipo-solicitudes',
                'alias' => 'Listar tipo solicitudes',
                'description' => 'Listar todos los tipos de solicitudes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplication',
                'parent_name_translated' => 'tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-obtener-tipo-solicitudes',
                'alias' => 'Obtener tipo solicitud',
                'description' => 'Obtener un tipo de solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplication',
                'parent_name_translated' => 'tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-crear-tipo-solicitudes',
                'alias' => 'Crear tipo solicitud',
                'description' => 'Agregar un tipo de solicitud',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplication',
                'parent_name_translated' => 'tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-actualizar-tipo-solicitudes',
                'alias' => 'Actualizar tipo solicitud',
                'description' => 'Actualizar un tipo de solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplication',
                'parent_name_translated' => 'tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-borrar-tipo-solicitudes',
                'alias' => 'Eliminar tipo solicitud',
                'description' => 'Eliminar tipo de solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplication',
                'parent_name_translated' => 'tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-obtener-hijos',
                'alias' => 'Obtener hijos tipo solicitud',
                'description' => 'Obtener un tipo de solicitud con sus hijos por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplication',
                'parent_name_translated' => 'tipo solicitudes',
                'module_group' => 'academic'
            ],
            /**
             * Solicitudes 342-346
             */
            [
                'name' => 'application-listar-solicitudes',
                'alias' => 'Listar solicitudes',
                'description' => 'Listar todas las solicitudes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'application',
                'parent_name_translated' => 'solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'application-obtener-solicitudes',
                'alias' => 'Obtener solicitud',
                'description' => 'Obtener una solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'application',
                'parent_name_translated' => 'solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'application-crear-solicitudes',
                'alias' => 'Crear solicitud',
                'description' => 'Agregar una solicitud',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'application',
                'parent_name_translated' => 'solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'application-actualizar-solicitudes',
                'alias' => 'Actualizar solicitud',
                'description' => 'Actualizar un de solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'application',
                'parent_name_translated' => 'solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'application-borrar-solicitudes',
                'alias' => 'Eliminar solicitud',
                'description' => 'Eliminar una solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'application',
                'parent_name_translated' => 'solicitudes',
                'module_group' => 'academic'
            ],
            /**
             * Configuracion tipo Solicitudes 347-351
             */
            [
                'name' => 'config-type-application-listar-config-tipo-solicitudes',
                'alias' => 'Listar configuracion tipo solicitudes',
                'description' => 'Listar todas las configuraciones tipo solicitudes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'confTypeApplication',
                'parent_name_translated' => 'configuracion de tipos de solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'config-type-application-obtener-config-tipo-solicitudes',
                'alias' => 'Obtener configuracion tipo solicitud',
                'description' => 'Obtener una configuracion de tipo solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'configTypeApplication',
                'parent_name_translated' => 'configuracion de tipos de solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'config-type-application-crear-config-tipo-solicitudes',
                'alias' => 'Crear configuracion tipo solicitud',
                'description' => 'Agregar una configuracion del tipo solicitud',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'configTypeApplication',
                'parent_name_translated' => 'configuracion de tipos de solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'config-type-application-actualizar-config-tipo-solicitudes',
                'alias' => 'Actualizar configuracion tipo solicitud',
                'description' => 'Actualizar una configuracion de tipo solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'configTypeApplication',
                'parent_name_translated' => 'configuracion de tipos de solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'config-type-application-borrar-config-tipo-solicitudes',
                'alias' => 'Eliminar configuracion tipo solicitud',
                'description' => 'Eliminar una configuracion de tipo solicitud por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'configTypeApplication',
                'parent_name_translated' => 'configuracion de tipos de solicitudes',
                'module_group' => 'academic'
            ],
            /**
             * Tipo Solicitudes Estado 352-356
             */
            [
                'name' => 'type-application-status-listar-estado-tipo-solicitudes',
                'alias' => 'Listar estados orden tipos solicitudes',
                'description' => 'Listar todos los estados del orden de tipo solicitudes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplicationStatus',
                'parent_name_translated' => 'estados del orden de tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-status-obtener-estado-tipo-solicitudes',
                'alias' => 'Obtener estados del orden de tipo solicitudes',
                'description' => 'Obtener un estados del orden de tipo solicitudes por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplicationStatus',
                'parent_name_translated' => 'estados del orden de tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-status-crear-estado-tipo-solicitudes',
                'alias' => 'Crear estados del orden de tipo solicitudes',
                'description' => 'Agregar un estado del orden de tipo solicitudes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplicationStatus',
                'parent_name_translated' => 'estados del orden de tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-status-actualizar-estado-tipo-solicitudes',
                'alias' => 'Actualizar estado del orden de tipo solicitudes',
                'description' => 'Actualizar un estado del orden de tipo solicitudes por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplicationStatus',
                'parent_name_translated' => 'estados del orden de tipo solicitudes',
                'module_group' => 'academic'
            ],
            [
                'name' => 'type-application-status-borrar-estado-tipo-solicitudes',
                'alias' => 'Eliminar estado del orden de tipo solicitudes',
                'description' => 'Eliminar un estado del orden de tipo solicitudes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeApplicationStatus',
                'parent_name_translated' => 'estados del orden de tipo solicitudes',
                'module_group' => 'academic'
            ],
            /**
             * Grupo Area 357-362
             */
            [
                'name' => 'group-areas-listar-areas',
                'alias' => 'Listar grupo area',
                'description' => 'Listar todos los grupo area',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'areaGroup',
                'parent_name_translated' => 'grupo area',
                'module_group' => 'academic'
            ],
            [
                'name' => 'group-areas-obtener-area',
                'alias' => 'Obtener grupo area',
                'description' => 'Obtener un grupo area por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'areaGroup',
                'parent_name_translated' => 'grupo area',
                'module_group' => 'academic'
            ],
            [
                'name' => 'group-areas-crear-area',
                'alias' => 'Crear grupo area',
                'description' => 'Agregar un grupo area',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'areaGroup',
                'parent_name_translated' => 'grupo area',
                'module_group' => 'academic'
            ],
            [
                'name' => 'group-areas-actualizar-area',
                'alias' => 'Actualizar grupo area',
                'description' => 'Actualizar un grupo area por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'areaGroup',
                'parent_name_translated' => 'grupo area',
                'module_group' => 'academic'
            ],
            [
                'name' => 'group-areas-borrar-area',
                'alias' => 'Eliminar grupo area',
                'description' => 'Eliminar grupo area por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'areaGroup',
                'parent_name_translated' => 'grupo area',
                'module_group' => 'academic'
            ],
            [
                'name' => 'group-areas-asignar-carreras-materias',
                'alias' => 'Asignar grupo area a carreras',
                'description' => 'Asignar a un grupo area una carrera',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'areaGroup',
                'parent_name_translated' => 'grupo area',
                'module_group' => 'academic'
            ],
            /**
             * Etapa Periodo 363-364
             */
            [
                'name' => 'periods-listar-etapas-por-periodo',
                'alias' => 'Listar etapa periodo',
                'description' => 'Listar todas las etapas por periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'etapa periodo',
                'module_group' => 'academic'
            ],
            [
                'name' => 'periods-listar-cursos-por-periodo',
                'alias' => 'Listar cursos periodo',
                'description' => 'Listar todos los cursos por periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods',
                'parent_name_translated' => 'etapa periodo',
                'module_group' => 'academic'
            ],
            /**
             * Aula 365
             */
            [
                'name' => 'classrooms-listar-cursos-por-aula',
                'alias' => 'Listar curso aula',
                'description' => 'Listar todos los cursos por aula',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms',
                'parent_name_translated' => 'aulas',
                'module_group' => 'academic'
            ],
            /**
             * Homologacion Externa 366-370
             */
            [
                'name' => 'external-homologations-listar-homologacion-externa',
                'alias' => 'Listar homologacion externa',
                'description' => 'Listar todas las homologaciones externas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'externalHomologation',
                'parent_name_translated' => 'homologacion externa',
                'module_group' => 'academic'
            ],
            [
                'name' => 'external-homologations-obtener-homologacion-externa',
                'alias' => 'Obtener homologacion externa',
                'description' => 'Obtener una homologacion externa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'externalHomologation',
                'parent_name_translated' => 'homologacion externa',
                'module_group' => 'academic'
            ],
            [
                'name' => 'external-homologations-crear-homologacion-externa',
                'alias' => 'Crear homologacion externa',
                'description' => 'Agregar una homologacion externa',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'externalHomologation',
                'parent_name_translated' => 'homologacion externa',
                'module_group' => 'academic'
            ],
            [
                'name' => 'external-homologations-actualizar-homologacion-externa',
                'alias' => 'Actualizar homologacion externa',
                'description' => 'Actualizar una homologacion externa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'externalHomologation',
                'parent_name_translated' => 'homologacion externa',
                'module_group' => 'academic'
            ],
            [
                'name' => 'external-homologations-borrar-homologacion-externa',
                'alias' => 'Eliminar homologacion externa',
                'description' => 'Eliminar homologacion externa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'externalHomologation',
                'parent_name_translated' => 'homologacion externa',
                'module_group' => 'academic'
            ],
            /**
             * Materia Institucion 371-375
             */
            [
                'name' => 'institution-subjects-listar-materias-institucion',
                'alias' => 'Listar materia institucion',
                'description' => 'Listar todas las materias de las instituciones',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutionSubject',
                'parent_name_translated' => 'materia institucion',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institution-subjects-obtener-materia-institucion',
                'alias' => 'Obtener materia institucion',
                'description' => 'Obtener una materia institucion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutionSubject',
                'parent_name_translated' => 'materia institucion',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institution-subjects-crear-materia-institucion',
                'alias' => 'Crear materia institucion',
                'description' => 'Agregar una materia institucion',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutionSubject',
                'parent_name_translated' => 'materia institucion',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institution-subjects-actualizar-materia-institucion',
                'alias' => 'Actualizar materia institucion',
                'description' => 'Actualizar una materia institucion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutionSubject',
                'parent_name_translated' => 'materia institucion',
                'module_group' => 'academic'
            ],
            [
                'name' => 'institution-subjects-borrar-materia-institucion',
                'alias' => 'Eliminar materia institucion',
                'description' => 'Eliminar materia institucion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutionSubject',
                'parent_name_translated' => 'materia institucion',
                'module_group' => 'academic'
            ],
            /**
             * Cursos 376-381
             */
            [
                'name' => 'coursestudent-listar-curso-estudiante',
                'alias' => 'Listar curso estudiante',
                'description' => 'Listar todos los cursos estudiantes',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'courseStudent',
                'parent_name_translated' => 'curso estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'coursestudent-obtener-curso-estudiante',
                'alias' => 'Obtener curso estudiante',
                'description' => 'Obtener un curso estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'courseStudent',
                'parent_name_translated' => 'curso estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'coursestudent-crear-curso-estudiante',
                'alias' => 'Crear curso estudiante',
                'description' => 'Agregar un curso estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'courseStudent',
                'parent_name_translated' => 'curso estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'coursestudent-actualizar-curso-estudiante',
                'alias' => 'Actualizar curso estudiante',
                'description' => 'Actualizar un curso estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'courseStudent',
                'parent_name_translated' => 'curso estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'courcoursestudentses-borrar-curso-estudiante',
                'alias' => 'Eliminar curso estudiante',
                'description' => 'Eliminar curso estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'courseStudent',
                'parent_name_translated' => 'curso estudiante',
                'module_group' => 'academic'
            ],
            [
                'name' => 'coursestudent-checkconditions-curso-estudiante',
                'alias' => 'valida condiciones curso estudiante',
                'description' => 'valida condiciones curso estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'courseStudent',
                'parent_name_translated' => 'curso estudiante',
                'module_group' => 'academic'
            ],
            /**
             * Aula Nivel Educativo 382
             */
            [
                'name' => 'classroom_education_levels-buscar-periods-and-education_levels-listar-aula-niveleconomico',
                'alias' => 'listar aula nivel economico',
                'description' => 'listar aulas por nivel economico',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomEducationLevel',
                'parent_name_translated' => 'aula nivel educativo',
                'module_group' => 'academic'
            ],
            /**
             * Malla 383
             */
            [
                'name' => 'meshs-actualizar-estado-mallas-vigente',
                'alias' => 'Actualizar estado malla',
                'description' => 'Actualizar estado de la malla vigente',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs',
                'parent_name_translated' => 'aula nivel educativo',
                'module_group' => 'academic'
            ],
        ]);

        /**
         *
         *
         *
         * Permisos de Administrador
         *
         *
         *
         */
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
            ['permission_id' => 41, 'role_id' => 1],
            ['permission_id' => 42, 'role_id' => 1],
            /**
             * Aulas
             */
            ['permission_id' => 43, 'role_id' => 1],
            ['permission_id' => 44, 'role_id' => 1],
            ['permission_id' => 45, 'role_id' => 1],
            ['permission_id' => 46, 'role_id' => 1],
            ['permission_id' => 47, 'role_id' => 1],
            ['permission_id' => 48, 'role_id' => 1],
            ['permission_id' => 49, 'role_id' => 1],
            /**
             * Pensum
             */
            ['permission_id' => 50, 'role_id' => 1],
            ['permission_id' => 51, 'role_id' => 1],
            ['permission_id' => 52, 'role_id' => 1],
            ['permission_id' => 53, 'role_id' => 1],
            ['permission_id' => 54, 'role_id' => 1],
            /**
             * Etapas
             */
            ['permission_id' => 55, 'role_id' => 1],
            ['permission_id' => 56, 'role_id' => 1],
            ['permission_id' => 57, 'role_id' => 1],
            ['permission_id' => 58, 'role_id' => 1],
            ['permission_id' => 59, 'role_id' => 1],
            /**
             * Tipos de Periodos
             */
            ['permission_id' => 60, 'role_id' => 1],
            ['permission_id' => 61, 'role_id' => 1],
            ['permission_id' => 62, 'role_id' => 1],
            ['permission_id' => 63, 'role_id' => 1],
            ['permission_id' => 64, 'role_id' => 1],
            /**
             * Mallas Academicas [Meshs] JS
             */
            ['permission_id' => 65, 'role_id' => 1],
            ['permission_id' => 66, 'role_id' => 1],
            ['permission_id' => 67, 'role_id' => 1],
            ['permission_id' => 68, 'role_id' => 1],
            ['permission_id' => 69, 'role_id' => 1],
            /**
             * Tipo Calificaciones
             */
            ['permission_id' => 70, 'role_id' => 1],
            ['permission_id' => 71, 'role_id' => 1],
            ['permission_id' => 72, 'role_id' => 1],
            ['permission_id' => 73, 'role_id' => 1],
            ['permission_id' => 74, 'role_id' => 1],
            /**
             * Tipos de Materias
             */
            ['permission_id' => 75, 'role_id' => 1],
            ['permission_id' => 76, 'role_id' => 1],
            ['permission_id' => 77, 'role_id' => 1],
            ['permission_id' => 78, 'role_id' => 1],
            ['permission_id' => 79, 'role_id' => 1],
            /**
             * Materias
             */
            ['permission_id' => 80, 'role_id' => 1],
            ['permission_id' => 81, 'role_id' => 1],
            ['permission_id' => 82, 'role_id' => 1],
            ['permission_id' => 83, 'role_id' => 1],
            ['permission_id' => 84, 'role_id' => 1],
            /**
             * Periodos por Etapas
             */
            ['permission_id' => 85, 'role_id' => 1],
            ['permission_id' => 86, 'role_id' => 1],
            ['permission_id' => 87, 'role_id' => 1],
            ['permission_id' => 88, 'role_id' => 1],
            ['permission_id' => 89, 'role_id' => 1],
            /**
             * User Colaboradores
             */
            ['permission_id' => 90, 'role_id' => 1],
            ['permission_id' => 91, 'role_id' => 1],
            /**
             * Periodos
             */
            ['permission_id' => 92, 'role_id' => 1],
            ['permission_id' => 93, 'role_id' => 1],
            ['permission_id' => 94, 'role_id' => 1],
            ['permission_id' => 95, 'role_id' => 1],
            ['permission_id' => 96, 'role_id' => 1],
            /**
             * Materias por Malla
             */
            ['permission_id' => 97, 'role_id' => 1],
            ['permission_id' => 98, 'role_id' => 1],
            ['permission_id' => 99, 'role_id' => 1],
            ['permission_id' => 100, 'role_id' => 1],
            ['permission_id' => 101, 'role_id' => 1],

        ]);

        DB::connection('tenant')->table('role_has_permissions')->insert([
            /**
             * Ofertas
             */
            ['permission_id' => 102, 'role_id' => 1],
            ['permission_id' => 103, 'role_id' => 1],
            ['permission_id' => 104, 'role_id' => 1],
            ['permission_id' => 105, 'role_id' => 1],
            ['permission_id' => 106, 'role_id' => 1],
            /**
             * Horarios 107-111
             */
            ['permission_id' => 107, 'role_id' => 1],
            ['permission_id' => 108, 'role_id' => 1],
            ['permission_id' => 109, 'role_id' => 1],
            ['permission_id' => 110, 'role_id' => 1],
            ['permission_id' => 111, 'role_id' => 1],
            /**
             * Institutos 112-116
             */
            ['permission_id' => 112, 'role_id' => 1],
            ['permission_id' => 113, 'role_id' => 1],
            ['permission_id' => 114, 'role_id' => 1],
            ['permission_id' => 115, 'role_id' => 1],
            ['permission_id' => 116, 'role_id' => 1],
            ['permission_id' => 117, 'role_id' => 1],
            /**
             * Tipo Institutos 117-121
             */
            ['permission_id' => 118, 'role_id' => 1],
            ['permission_id' => 119, 'role_id' => 1],
            ['permission_id' => 120, 'role_id' => 1],
            ['permission_id' => 121, 'role_id' => 1],
            /**
             * Mail 122-124
             */
            ['permission_id' => 122, 'role_id' => 1],
            ['permission_id' => 123, 'role_id' => 1],
            ['permission_id' => 124, 'role_id' => 1],
            /**
             * Estado Materia 125-129
             */
            ['permission_id' => 125, 'role_id' => 1],
            ['permission_id' => 126, 'role_id' => 1],
            ['permission_id' => 127, 'role_id' => 1],
            ['permission_id' => 128, 'role_id' => 1],
            ['permission_id' => 129, 'role_id' => 1],
            /**
             * Usuario 130-132
             */
            ['permission_id' => 130, 'role_id' => 1],
            ['permission_id' => 131, 'role_id' => 1],
            ['permission_id' => 132, 'role_id' => 1],
            /**
             * Niveles Educativos 133-137
             */
            ['permission_id' => 133, 'role_id' => 1],
            ['permission_id' => 134, 'role_id' => 1],
            ['permission_id' => 135, 'role_id' => 1],
            ['permission_id' => 136, 'role_id' => 1],
            ['permission_id' => 137, 'role_id' => 1],
            /**
             * Tipo Estudiante 138-139
             */
            ['permission_id' => 138, 'role_id' => 1],
            ['permission_id' => 139, 'role_id' => 1],
            /**
             * Tipo Documento 140-144
             */
            ['permission_id' => 140, 'role_id' => 1],
            ['permission_id' => 141, 'role_id' => 1],
            ['permission_id' => 142, 'role_id' => 1],
            ['permission_id' => 143, 'role_id' => 1],
            ['permission_id' => 144, 'role_id' => 1],
            /**
             * Grupo Economico 145-149
             */
            ['permission_id' => 145, 'role_id' => 1],
            ['permission_id' => 146, 'role_id' => 1],
            ['permission_id' => 147, 'role_id' => 1],
            ['permission_id' => 148, 'role_id' => 1],
            ['permission_id' => 149, 'role_id' => 1],
            /**
             * Tipos Discapacidad 150-151
             */
            ['permission_id' => 150, 'role_id' => 1],
            ['permission_id' => 151, 'role_id' => 1],
            /**
             * Tipo sangre 152-153
             */
            ['permission_id' => 152, 'role_id' => 1],
            ['permission_id' => 153, 'role_id' => 1],
            /**
             * Tipo Educacion 154-155
             */
            ['permission_id' => 154, 'role_id' => 1],
            ['permission_id' => 155, 'role_id' => 1],
            /**
             * Persona Trabajo 156-161
             */
            ['permission_id' => 156, 'role_id' => 1],
            ['permission_id' => 157, 'role_id' => 1],
            ['permission_id' => 158, 'role_id' => 1],
            ['permission_id' => 159, 'role_id' => 1],
            ['permission_id' => 160, 'role_id' => 1],
            ['permission_id' => 161, 'role_id' => 1],
            /**
             * Tenant 162
             */
            ['permission_id' => 162, 'role_id' => 1],
            /**
             * Criterio Estudiante 163-167
             */
            ['permission_id' => 163, 'role_id' => 1],
            ['permission_id' => 164, 'role_id' => 1],
            ['permission_id' => 165, 'role_id' => 1],
            ['permission_id' => 166, 'role_id' => 1],
            ['permission_id' => 167, 'role_id' => 1],
            /**
             * Record Estudiantil 168-172
             */
            ['permission_id' => 168, 'role_id' => 1],
            ['permission_id' => 169, 'role_id' => 1],
            ['permission_id' => 170, 'role_id' => 1],
            ['permission_id' => 171, 'role_id' => 1],
            ['permission_id' => 172, 'role_id' => 1],
            /**
             * Oferta 173-174
             */
            ['permission_id' => 173, 'role_id' => 1],
            ['permission_id' => 174, 'role_id' => 1],
            /**
             * Periodo 175-176
             */
            ['permission_id' => 175, 'role_id' => 1],
            ['permission_id' => 176, 'role_id' => 1],
            /**
             * Persona 177-181
             */
            ['permission_id' => 177, 'role_id' => 1],
            ['permission_id' => 178, 'role_id' => 1],
            ['permission_id' => 179, 'role_id' => 1],
            ['permission_id' => 180, 'role_id' => 1],
            ['permission_id' => 181, 'role_id' => 1],
            /**
             * Contacto Emergencia 182-186
             */
            ['permission_id' => 182, 'role_id' => 1],
            ['permission_id' => 183, 'role_id' => 1],
            ['permission_id' => 184, 'role_id' => 1],
            ['permission_id' => 185, 'role_id' => 1],
            ['permission_id' => 186, 'role_id' => 1],
            /**
             * Periodos 187-188
             */
            ['permission_id' => 187, 'role_id' => 1],
            ['permission_id' => 188, 'role_id' => 1],
            /**
             * Etiqueta Estudiante 189-193
             */
            ['permission_id' => 189, 'role_id' => 1],
            ['permission_id' => 190, 'role_id' => 1],
            ['permission_id' => 191, 'role_id' => 1],
            ['permission_id' => 192, 'role_id' => 1],
            ['permission_id' => 193, 'role_id' => 1],
            /**
             * Persona 194
             */
            ['permission_id' => 194, 'role_id' => 1],
            /**
             * Catalogar 195-199
             */
            ['permission_id' => 195, 'role_id' => 1],
            ['permission_id' => 196, 'role_id' => 1],
            ['permission_id' => 197, 'role_id' => 1],
            ['permission_id' => 198, 'role_id' => 1],
            ['permission_id' => 199, 'role_id' => 1],


        ]);

        DB::connection('tenant')->table('role_has_permissions')->insert([
            /**
             * Documentos Estudiante 200-205
             */
            ['permission_id' => 200, 'role_id' => 1],
            ['permission_id' => 201, 'role_id' => 1],
            ['permission_id' => 202, 'role_id' => 1],
            ['permission_id' => 203, 'role_id' => 1],
            ['permission_id' => 204, 'role_id' => 1],
            ['permission_id' => 205, 'role_id' => 1],
            /**
             * Estados 206
             */
            ['permission_id' => 206, 'role_id' => 1],
            /**
             * Mencion 207-208
             */
            ['permission_id' => 207, 'role_id' => 1],
            ['permission_id' => 208, 'role_id' => 1],
            /**
             * Tipo progama estudiante 209-213
             */
            ['permission_id' => 209, 'role_id' => 1],
            ['permission_id' => 210, 'role_id' => 1],
            ['permission_id' => 211, 'role_id' => 1],
            ['permission_id' => 212, 'role_id' => 1],
            ['permission_id' => 213, 'role_id' => 1],
            ['permission_id' => 214, 'role_id' => 1],
            /**
             * Familia 214-219
             */
            ['permission_id' => 215, 'role_id' => 1],
            ['permission_id' => 216, 'role_id' => 1],
            ['permission_id' => 217, 'role_id' => 1],
            ['permission_id' => 218, 'role_id' => 1],
            ['permission_id' => 219, 'role_id' => 1],
            /**
             * Categoria Estados 220
             */
            ['permission_id' => 220, 'role_id' => 1],
            /**
             * Estudiantes 221-224
             */
            ['permission_id' => 221, 'role_id' => 1],
            ['permission_id' => 222, 'role_id' => 1],
            ['permission_id' => 223, 'role_id' => 1],
            ['permission_id' => 224, 'role_id' => 1],
            /**
             * Materia Malla 225-226
             */
            ['permission_id' => 225, 'role_id' => 1],
            ['permission_id' => 226, 'role_id' => 1],
            /**
             * Persona 227
             */
            ['permission_id' => 227, 'role_id' => 1],
            /**
             * Materia Malla 228
             */
            ['permission_id' => 228, 'role_id' => 1],
            /**
             * Simbology 229-233
             */
            ['permission_id' => 229, 'role_id' => 1],
            ['permission_id' => 230, 'role_id' => 1],
            ['permission_id' => 231, 'role_id' => 1],
            ['permission_id' => 232, 'role_id' => 1],
            ['permission_id' => 233, 'role_id' => 1],
            /**
             * Simbologia Oferta 234-235
             */
            ['permission_id' => 234, 'role_id' => 1],
            ['permission_id' => 235, 'role_id' => 1],
            /**
             * Record de Programa Estudiantil 236-241
             */
            ['permission_id' => 236, 'role_id' => 1],
            ['permission_id' => 237, 'role_id' => 1],
            ['permission_id' => 238, 'role_id' => 1],
            ['permission_id' => 239, 'role_id' => 1],
            ['permission_id' => 240, 'role_id' => 1],
            ['permission_id' => 241, 'role_id' => 1],
            /**
             * Record de Periodo Estudiantil 242-246
             */
            ['permission_id' => 242, 'role_id' => 1],
            ['permission_id' => 243, 'role_id' => 1],
            ['permission_id' => 244, 'role_id' => 1],
            ['permission_id' => 245, 'role_id' => 1],
            ['permission_id' => 246, 'role_id' => 1],
            /**
             * Tipo Aulas 247-251
             */
            ['permission_id' => 247, 'role_id' => 1],
            ['permission_id' => 248, 'role_id' => 1],
            ['permission_id' => 249, 'role_id' => 1],
            ['permission_id' => 250, 'role_id' => 1],
            ['permission_id' => 251, 'role_id' => 1],
            /**
             * Estudiante 252-253
             */
            ['permission_id' => 252, 'role_id' => 1],
            ['permission_id' => 253, 'role_id' => 1],
            /**
             * Cargo 254-260
             */
            ['permission_id' => 254, 'role_id' => 1],
            ['permission_id' => 255, 'role_id' => 1],
            ['permission_id' => 256, 'role_id' => 1],
            ['permission_id' => 257, 'role_id' => 1],
            ['permission_id' => 258, 'role_id' => 1],
            ['permission_id' => 259, 'role_id' => 1],
            ['permission_id' => 260, 'role_id' => 1],
            /**
             * Componente 261-265
             */
            ['permission_id' => 261, 'role_id' => 1],
            ['permission_id' => 262, 'role_id' => 1],
            ['permission_id' => 263, 'role_id' => 1],
            ['permission_id' => 264, 'role_id' => 1],
            ['permission_id' => 265, 'role_id' => 1],
            /**
             * Detalle Materia Malla 266-270
             */
            ['permission_id' => 266, 'role_id' => 1],
            ['permission_id' => 267, 'role_id' => 1],
            ['permission_id' => 268, 'role_id' => 1],
            ['permission_id' => 269, 'role_id' => 1],
            ['permission_id' => 270, 'role_id' => 1],
            /**
             * Componente Aprendizaje 271-275
             */
            ['permission_id' => 271, 'role_id' => 1],
            ['permission_id' => 272, 'role_id' => 1],
            ['permission_id' => 273, 'role_id' => 1],
            ['permission_id' => 274, 'role_id' => 1],
            ['permission_id' => 275, 'role_id' => 1],
            /**
             * Modelo Calificacion 276-280
             */
            ['permission_id' => 276, 'role_id' => 1],
            ['permission_id' => 277, 'role_id' => 1],
            ['permission_id' => 278, 'role_id' => 1],
            ['permission_id' => 279, 'role_id' => 1],
            ['permission_id' => 280, 'role_id' => 1],
            /**
             * Convenios 281-286
             */
            ['permission_id' => 281, 'role_id' => 1],
            ['permission_id' => 282, 'role_id' => 1],
            ['permission_id' => 283, 'role_id' => 1],
            ['permission_id' => 284, 'role_id' => 1],
            ['permission_id' => 285, 'role_id' => 1],
            ['permission_id' => 286, 'role_id' => 1],
            /**
             * Areas 287-291
             */
            ['permission_id' => 287, 'role_id' => 1],
            ['permission_id' => 288, 'role_id' => 1],
            ['permission_id' => 289, 'role_id' => 1],
            ['permission_id' => 290, 'role_id' => 1],
            ['permission_id' => 291, 'role_id' => 1],
            /**
             * Departamentos 292-296
             */
            ['permission_id' => 292, 'role_id' => 1],
            ['permission_id' => 293, 'role_id' => 1],
            ['permission_id' => 294, 'role_id' => 1],
            ['permission_id' => 295, 'role_id' => 1],
            ['permission_id' => 296, 'role_id' => 1],
            /**
             * Colaboradores 297-298
             */
            ['permission_id' => 297, 'role_id' => 1],
            ['permission_id' => 298, 'role_id' => 1],
        ]);

        DB::connection('tenant')->table('role_has_permissions')->insert([
            /**
             * Nivel Educativo Aula 299-303
             */
            ['permission_id' => 299, 'role_id' => 1],
            ['permission_id' => 300, 'role_id' => 1],
            ['permission_id' => 301, 'role_id' => 1],
            ['permission_id' => 302, 'role_id' => 1],
            ['permission_id' => 303, 'role_id' => 1],
            /**
             * Actualizar Foto Estudiante 304
             */
            ['permission_id' => 304, 'role_id' => 1],
            /**
             * Horas Colaborador 305-309
             */
            ['permission_id' => 305, 'role_id' => 1],
            ['permission_id' => 306, 'role_id' => 1],
            ['permission_id' => 307, 'role_id' => 1],
            ['permission_id' => 308, 'role_id' => 1],
            ['permission_id' => 309, 'role_id' => 1],
            /**
             * Resumen Horas 310-314
             */
            ['permission_id' => 310, 'role_id' => 1],
            ['permission_id' => 311, 'role_id' => 1],
            ['permission_id' => 312, 'role_id' => 1],
            ['permission_id' => 313, 'role_id' => 1],
            ['permission_id' => 314, 'role_id' => 1],
            /**
             * Colaboradores 315-317
             */
            ['permission_id' => 315, 'role_id' => 1],
            ['permission_id' => 316, 'role_id' => 1],
            ['permission_id' => 317, 'role_id' => 1],
            /**
             * Tipo Reportes 318-322
             */
            ['permission_id' => 318, 'role_id' => 1],
            ['permission_id' => 319, 'role_id' => 1],
            ['permission_id' => 320, 'role_id' => 1],
            ['permission_id' => 321, 'role_id' => 1],
            ['permission_id' => 322, 'role_id' => 1],
            /**
             * Permisos 323
             */
            ['permission_id' => 323, 'role_id' => 1],
            /**
             * Cursos 324-328
             */
            ['permission_id' => 324, 'role_id' => 1],
            ['permission_id' => 325, 'role_id' => 1],
            ['permission_id' => 326, 'role_id' => 1],
            ['permission_id' => 327, 'role_id' => 1],
            ['permission_id' => 328, 'role_id' => 1],
            /**
             * Nivel Carrera Materia 329-333
             */
            ['permission_id' => 329, 'role_id' => 1],
            ['permission_id' => 330, 'role_id' => 1],
            ['permission_id' => 331, 'role_id' => 1],
            ['permission_id' => 332, 'role_id' => 1],
            ['permission_id' => 333, 'role_id' => 1],
            /**
             * Periodo 334
             */
            ['permission_id' => 334, 'role_id' => 1],
            /**
             * Campus 335
             */
            ['permission_id' => 335, 'role_id' => 1],
            /**
             * Tipo Solicitudes 336-341
             */
            ['permission_id' => 336, 'role_id' => 1],
            ['permission_id' => 337, 'role_id' => 1],
            ['permission_id' => 338, 'role_id' => 1],
            ['permission_id' => 339, 'role_id' => 1],
            ['permission_id' => 340, 'role_id' => 1],
            ['permission_id' => 341, 'role_id' => 1],
            /**
             * Solicitudes 342-346
             */
            ['permission_id' => 342, 'role_id' => 1],
            ['permission_id' => 343, 'role_id' => 1],
            ['permission_id' => 344, 'role_id' => 1],
            ['permission_id' => 345, 'role_id' => 1],
            ['permission_id' => 346, 'role_id' => 1],
            /**
             * Configuracion tipo Solicitudes 347-351
             */
            ['permission_id' => 347, 'role_id' => 1],
            ['permission_id' => 348, 'role_id' => 1],
            ['permission_id' => 349, 'role_id' => 1],
            ['permission_id' => 350, 'role_id' => 1],
            ['permission_id' => 351, 'role_id' => 1],
            /**
             * Tipo Solicitudes Estado 352-356
             */
            ['permission_id' => 352, 'role_id' => 1],
            ['permission_id' => 353, 'role_id' => 1],
            ['permission_id' => 354, 'role_id' => 1],
            ['permission_id' => 355, 'role_id' => 1],
            ['permission_id' => 356, 'role_id' => 1],
            /**
             * Grupo Area 357-362
             */
            ['permission_id' => 357, 'role_id' => 1],
            ['permission_id' => 358, 'role_id' => 1],
            ['permission_id' => 359, 'role_id' => 1],
            ['permission_id' => 360, 'role_id' => 1],
            ['permission_id' => 361, 'role_id' => 1],
            ['permission_id' => 362, 'role_id' => 1],
            /**
             * Etapa Periodo 363-364
             */
            ['permission_id' => 363, 'role_id' => 1],
            ['permission_id' => 364, 'role_id' => 1],
            /**
             * Aula 365
             */
            ['permission_id' => 365, 'role_id' => 1],
            /**
             * Homologacion Externa 366-370
             */
            ['permission_id' => 366, 'role_id' => 1],
            ['permission_id' => 367, 'role_id' => 1],
            ['permission_id' => 368, 'role_id' => 1],
            ['permission_id' => 369, 'role_id' => 1],
            ['permission_id' => 370, 'role_id' => 1],
            /**
             * Materia Institucion 371-375
             */
            ['permission_id' => 371, 'role_id' => 1],
            ['permission_id' => 372, 'role_id' => 1],
            ['permission_id' => 373, 'role_id' => 1],
            ['permission_id' => 374, 'role_id' => 1],
            ['permission_id' => 375, 'role_id' => 1],
            /**
             * Cursos 376-381
             */
            ['permission_id' => 376, 'role_id' => 1],
            ['permission_id' => 377, 'role_id' => 1],
            ['permission_id' => 378, 'role_id' => 1],
            ['permission_id' => 379, 'role_id' => 1],
            ['permission_id' => 380, 'role_id' => 1],
            ['permission_id' => 381, 'role_id' => 1],
            /**
             * Aula Nivel Educativo 382
             */
            ['permission_id' => 382, 'role_id' => 1],
            /**
             * Malla 383
             */
            ['permission_id' => 383, 'role_id' => 1],
        ]);

        /**
         *
         *
         *
         * Permisos de Administrador
         *
         *
         *
         */

        DB::connection('tenant')->table('role_has_permissions')->insert([
            /**
             * Perfiles
             */
            ['permission_id' => 1, 'role_id' => 2],
            ['permission_id' => 2, 'role_id' => 2],
            ['permission_id' => 3, 'role_id' => 2],
            ['permission_id' => 4, 'role_id' => 2],
            ['permission_id' => 5, 'role_id' => 2],
            ['permission_id' => 6, 'role_id' => 2],
            /**
             * Roles
             * (solo listar y obtener)
             */
            ['permission_id' => 7, 'role_id' => 2],
            ['permission_id' => 8, 'role_id' => 2],
            /**
             * Permisos
             * (solo listar y obtener)
             */
            ['permission_id' => 12, 'role_id' => 2],
            ['permission_id' => 13, 'role_id' => 2],
            /**
             * Compañias
             */
            ['permission_id' => 17, 'role_id' => 2],
            ['permission_id' => 18, 'role_id' => 2],
            ['permission_id' => 19, 'role_id' => 2],
            ['permission_id' => 20, 'role_id' => 2],
            ['permission_id' => 21, 'role_id' => 2],
            /**
             * Sedes
             */
            ['permission_id' => 22, 'role_id' => 2],
            ['permission_id' => 23, 'role_id' => 2],
            ['permission_id' => 24, 'role_id' => 2],
            ['permission_id' => 25, 'role_id' => 2],
            ['permission_id' => 26, 'role_id' => 2],
            /**
             * Usuarios
             */
            ['permission_id' => 27, 'role_id' => 2],
            ['permission_id' => 28, 'role_id' => 2],
            ['permission_id' => 29, 'role_id' => 2],
            ['permission_id' => 30, 'role_id' => 2],
            ['permission_id' => 31, 'role_id' => 2],
            ['permission_id' => 32, 'role_id' => 2],
            ['permission_id' => 33, 'role_id' => 2],
            ['permission_id' => 34, 'role_id' => 2],
            ['permission_id' => 35, 'role_id' => 2],
            /**
             * Paralelos
             */
            ['permission_id' => 36, 'role_id' => 2],
            ['permission_id' => 37, 'role_id' => 2],
            ['permission_id' => 38, 'role_id' => 2],
            ['permission_id' => 39, 'role_id' => 2],
            ['permission_id' => 40, 'role_id' => 2],
            ['permission_id' => 41, 'role_id' => 2],
            ['permission_id' => 42, 'role_id' => 2],
            /**
             * Aulas
             */
            ['permission_id' => 43, 'role_id' => 2],
            ['permission_id' => 44, 'role_id' => 2],
            ['permission_id' => 45, 'role_id' => 2],
            ['permission_id' => 46, 'role_id' => 2],
            ['permission_id' => 47, 'role_id' => 2],
            ['permission_id' => 48, 'role_id' => 2],
            ['permission_id' => 49, 'role_id' => 2],
            /**
             * Pensum
             */
            ['permission_id' => 50, 'role_id' => 2],
            ['permission_id' => 51, 'role_id' => 2],
            ['permission_id' => 52, 'role_id' => 2],
            ['permission_id' => 53, 'role_id' => 2],
            ['permission_id' => 54, 'role_id' => 2],
            /**
             * Etapas
             */
            ['permission_id' => 55, 'role_id' => 2],
            ['permission_id' => 56, 'role_id' => 2],
            ['permission_id' => 57, 'role_id' => 2],
            ['permission_id' => 58, 'role_id' => 2],
            ['permission_id' => 59, 'role_id' => 2],
            /**
             * Tipos de Periodos
             */
            ['permission_id' => 60, 'role_id' => 2],
            ['permission_id' => 61, 'role_id' => 2],
            ['permission_id' => 62, 'role_id' => 2],
            ['permission_id' => 63, 'role_id' => 2],
            ['permission_id' => 64, 'role_id' => 2],
            /**
             * Mallas Academicas [Meshs] JS
             */
            ['permission_id' => 65, 'role_id' => 2],
            ['permission_id' => 66, 'role_id' => 2],
            ['permission_id' => 67, 'role_id' => 2],
            ['permission_id' => 68, 'role_id' => 2],
            ['permission_id' => 69, 'role_id' => 2],
            /**
             * Tipo Calificaciones
             */
            ['permission_id' => 70, 'role_id' => 2],
            ['permission_id' => 71, 'role_id' => 2],
            ['permission_id' => 72, 'role_id' => 2],
            ['permission_id' => 73, 'role_id' => 2],
            ['permission_id' => 74, 'role_id' => 2],
            /**
             * Tipos de Materias
             */
            ['permission_id' => 75, 'role_id' => 2],
            ['permission_id' => 76, 'role_id' => 2],
            ['permission_id' => 77, 'role_id' => 2],
            ['permission_id' => 78, 'role_id' => 2],
            ['permission_id' => 79, 'role_id' => 2],
            /**
             * Materias
             */
            ['permission_id' => 80, 'role_id' => 2],
            ['permission_id' => 81, 'role_id' => 2],
            ['permission_id' => 82, 'role_id' => 2],
            ['permission_id' => 83, 'role_id' => 2],
            ['permission_id' => 84, 'role_id' => 2],
            /**
             * Periodos por Etapas
             */
            ['permission_id' => 85, 'role_id' => 2],
            ['permission_id' => 86, 'role_id' => 2],
            ['permission_id' => 87, 'role_id' => 2],
            ['permission_id' => 88, 'role_id' => 2],
            ['permission_id' => 89, 'role_id' => 2],
            /**
             * User Colaboradores
             */
            ['permission_id' => 90, 'role_id' => 2],
            ['permission_id' => 91, 'role_id' => 2],
            /**
             * Periodos
             */
            ['permission_id' => 92, 'role_id' => 2],
            ['permission_id' => 93, 'role_id' => 2],
            ['permission_id' => 94, 'role_id' => 2],
            ['permission_id' => 95, 'role_id' => 2],
            ['permission_id' => 96, 'role_id' => 2],
            /**
             * Materias por Malla
             */
            ['permission_id' => 97, 'role_id' => 2],
            ['permission_id' => 98, 'role_id' => 2],
            ['permission_id' => 99, 'role_id' => 2],
            ['permission_id' => 100, 'role_id' => 2],
            ['permission_id' => 101, 'role_id' => 2],
            /**
             * Ofertas
             */
            ['permission_id' => 102, 'role_id' => 2],
            ['permission_id' => 103, 'role_id' => 2],
            ['permission_id' => 104, 'role_id' => 2],
            ['permission_id' => 105, 'role_id' => 2],
            ['permission_id' => 106, 'role_id' => 2],
            /**
             * Horarios 107-111
             */
            ['permission_id' => 107, 'role_id' => 2],
            ['permission_id' => 108, 'role_id' => 2],
            ['permission_id' => 109, 'role_id' => 2],
            ['permission_id' => 110, 'role_id' => 2],
            ['permission_id' => 111, 'role_id' => 2],
            /**
             * Institutos 112-116
             */
            ['permission_id' => 112, 'role_id' => 2],
            ['permission_id' => 113, 'role_id' => 2],
            ['permission_id' => 114, 'role_id' => 2],
            ['permission_id' => 115, 'role_id' => 2],
            ['permission_id' => 116, 'role_id' => 2],
            ['permission_id' => 117, 'role_id' => 2],
            /**
             * Tipo Institutos 117-121
             */
            ['permission_id' => 118, 'role_id' => 2],
            ['permission_id' => 119, 'role_id' => 2],
            ['permission_id' => 120, 'role_id' => 2],
            ['permission_id' => 121, 'role_id' => 2],
            /**
             * Mail 122-124
             */
            ['permission_id' => 122, 'role_id' => 2],
            ['permission_id' => 123, 'role_id' => 2],
            ['permission_id' => 124, 'role_id' => 2],
            /**
             * Estado Materia 125-129
             */
            ['permission_id' => 125, 'role_id' => 2],
            ['permission_id' => 126, 'role_id' => 2],
            ['permission_id' => 127, 'role_id' => 2],
            ['permission_id' => 128, 'role_id' => 2],
            ['permission_id' => 129, 'role_id' => 2],
            /**
             * Usuario 130-132
             */
            ['permission_id' => 130, 'role_id' => 2],
            ['permission_id' => 131, 'role_id' => 2],
            ['permission_id' => 132, 'role_id' => 2],
            /**
             * Niveles Educativos 133-137
             */
            ['permission_id' => 133, 'role_id' => 2],
            ['permission_id' => 134, 'role_id' => 2],
            ['permission_id' => 135, 'role_id' => 2],
            ['permission_id' => 136, 'role_id' => 2],
            ['permission_id' => 137, 'role_id' => 2],
            /**
             * Tipo Estudiante 138-139
             */
            ['permission_id' => 138, 'role_id' => 2],
            ['permission_id' => 139, 'role_id' => 2],
            /**
             * Tipo Documento 140-144
             */
            ['permission_id' => 140, 'role_id' => 2],
            ['permission_id' => 141, 'role_id' => 2],
            ['permission_id' => 142, 'role_id' => 2],
            ['permission_id' => 143, 'role_id' => 2],
            ['permission_id' => 144, 'role_id' => 2],
            /**
             * Grupo Economico 145-149
             */
            ['permission_id' => 145, 'role_id' => 2],
            ['permission_id' => 146, 'role_id' => 2],
            ['permission_id' => 147, 'role_id' => 2],
            ['permission_id' => 148, 'role_id' => 2],
            ['permission_id' => 149, 'role_id' => 2],
            /**
             * Tipos Discapacidad 150-151
             */
            ['permission_id' => 150, 'role_id' => 2],
            ['permission_id' => 151, 'role_id' => 2],
            /**
             * Tipo sangre 152-153
             */
            ['permission_id' => 152, 'role_id' => 2],
            ['permission_id' => 153, 'role_id' => 2],
            /**
             * Tipo Educacion 154-155
             */
            ['permission_id' => 154, 'role_id' => 2],
            ['permission_id' => 155, 'role_id' => 2],
            /**
             * Persona Trabajo 156-161
             */
            ['permission_id' => 156, 'role_id' => 2],
            ['permission_id' => 157, 'role_id' => 2],
            ['permission_id' => 158, 'role_id' => 2],
            ['permission_id' => 159, 'role_id' => 2],
            ['permission_id' => 160, 'role_id' => 2],
            ['permission_id' => 161, 'role_id' => 2],
            /**
             * Criterio Estudiante 163-167
             */
            ['permission_id' => 163, 'role_id' => 2],
            ['permission_id' => 164, 'role_id' => 2],
            ['permission_id' => 165, 'role_id' => 2],
            ['permission_id' => 166, 'role_id' => 2],
            ['permission_id' => 167, 'role_id' => 2],
            /**
             * Record Estudiantil 168-172
             */
            ['permission_id' => 168, 'role_id' => 2],
            ['permission_id' => 169, 'role_id' => 2],
            ['permission_id' => 170, 'role_id' => 2],
            ['permission_id' => 171, 'role_id' => 2],
            ['permission_id' => 172, 'role_id' => 2],
            /**
             * Oferta 173-174
             */
            ['permission_id' => 173, 'role_id' => 2],
            ['permission_id' => 174, 'role_id' => 2],
            /**
             * Periodo 175-176
             */
            ['permission_id' => 175, 'role_id' => 2],
            ['permission_id' => 176, 'role_id' => 2],
            /**
             * Persona 177-181
             */
            ['permission_id' => 177, 'role_id' => 2],
            ['permission_id' => 178, 'role_id' => 2],
            ['permission_id' => 179, 'role_id' => 2],
            ['permission_id' => 180, 'role_id' => 2],
            ['permission_id' => 181, 'role_id' => 2],
            /**
             * Contacto Emergencia 182-186
             */
            ['permission_id' => 182, 'role_id' => 2],
            ['permission_id' => 183, 'role_id' => 2],
            ['permission_id' => 184, 'role_id' => 2],
            ['permission_id' => 185, 'role_id' => 2],
            ['permission_id' => 186, 'role_id' => 2],
            /**
             * Periodos 187-188
             */
            ['permission_id' => 187, 'role_id' => 2],
            ['permission_id' => 188, 'role_id' => 2],
            /**
             * Etiqueta Estudiante 189-193
             */
            ['permission_id' => 189, 'role_id' => 2],
            ['permission_id' => 190, 'role_id' => 2],
            ['permission_id' => 191, 'role_id' => 2],
            ['permission_id' => 192, 'role_id' => 2],
            ['permission_id' => 193, 'role_id' => 2],
            /**
             * Persona 194
             */
            ['permission_id' => 194, 'role_id' => 2],
            /**
             * Catalogar 195-199
             */
            ['permission_id' => 195, 'role_id' => 2],
            ['permission_id' => 196, 'role_id' => 2],
            ['permission_id' => 197, 'role_id' => 2],
            ['permission_id' => 198, 'role_id' => 2],
            ['permission_id' => 199, 'role_id' => 2],
            /**
             * Documentos Estudiante 200-205
             */
            ['permission_id' => 200, 'role_id' => 2],
            ['permission_id' => 201, 'role_id' => 2],
            ['permission_id' => 202, 'role_id' => 2],
            ['permission_id' => 203, 'role_id' => 2],
            ['permission_id' => 204, 'role_id' => 2],
            ['permission_id' => 205, 'role_id' => 2],
            /**
             * Estados 206
             */
            ['permission_id' => 206, 'role_id' => 2],
            /**
             * Mencion 207-208
             */
            ['permission_id' => 207, 'role_id' => 2],
            ['permission_id' => 208, 'role_id' => 2],
            /**
             * Tipo progama estudiante 209-213
             */
            ['permission_id' => 209, 'role_id' => 2],
            ['permission_id' => 210, 'role_id' => 2],
            ['permission_id' => 211, 'role_id' => 2],
            ['permission_id' => 212, 'role_id' => 2],
            ['permission_id' => 213, 'role_id' => 2],
            ['permission_id' => 214, 'role_id' => 2],
            /**
             * Familia 214-219
             */
            ['permission_id' => 215, 'role_id' => 2],
            ['permission_id' => 216, 'role_id' => 2],
            ['permission_id' => 217, 'role_id' => 2],
            ['permission_id' => 218, 'role_id' => 2],
            ['permission_id' => 219, 'role_id' => 2],
            /**
             * Categoria Estados 220
             */
            ['permission_id' => 220, 'role_id' => 2],
            /**
             * Estudiantes 221-224
             */
            ['permission_id' => 221, 'role_id' => 2],
            ['permission_id' => 222, 'role_id' => 2],
            ['permission_id' => 223, 'role_id' => 2],
            ['permission_id' => 224, 'role_id' => 2],
            /**
             * Materia Malla 225-226
             */
            ['permission_id' => 225, 'role_id' => 2],
            ['permission_id' => 226, 'role_id' => 2],
            /**
             * Persona 227
             */
            ['permission_id' => 227, 'role_id' => 2],
            /**
             * Materia Malla 228
             */
            ['permission_id' => 228, 'role_id' => 2],
            /**
             * Simbology 229-233
             */
            ['permission_id' => 229, 'role_id' => 2],
            ['permission_id' => 230, 'role_id' => 2],
            ['permission_id' => 231, 'role_id' => 2],
            ['permission_id' => 232, 'role_id' => 2],
            ['permission_id' => 233, 'role_id' => 2],
            /**
             * Simbologia Oferta 234-235
             */
            ['permission_id' => 234, 'role_id' => 2],
            ['permission_id' => 235, 'role_id' => 2],
            /**
             * Record de Programa Estudiantil 236-241
             */
            ['permission_id' => 236, 'role_id' => 2],
            ['permission_id' => 237, 'role_id' => 2],
            ['permission_id' => 238, 'role_id' => 2],
            ['permission_id' => 239, 'role_id' => 2],
            ['permission_id' => 240, 'role_id' => 2],
            ['permission_id' => 241, 'role_id' => 2],
            /**
             * Record de Periodo Estudiantil 242-246
             */
            ['permission_id' => 242, 'role_id' => 2],
            ['permission_id' => 243, 'role_id' => 2],
            ['permission_id' => 244, 'role_id' => 2],
            ['permission_id' => 245, 'role_id' => 2],
            ['permission_id' => 246, 'role_id' => 2],
            /**
             * Tipo Aulas 247-251
             */
            ['permission_id' => 247, 'role_id' => 2],
            ['permission_id' => 248, 'role_id' => 2],
            ['permission_id' => 249, 'role_id' => 2],
            ['permission_id' => 250, 'role_id' => 2],
            ['permission_id' => 251, 'role_id' => 2],
            /**
             * Estudiante 252-253
             */
            ['permission_id' => 252, 'role_id' => 2],
            ['permission_id' => 253, 'role_id' => 2],
            /**
             * Cargo 254-260
             */
            ['permission_id' => 254, 'role_id' => 2],
            ['permission_id' => 255, 'role_id' => 2],
            ['permission_id' => 256, 'role_id' => 2],
            ['permission_id' => 257, 'role_id' => 2],
            ['permission_id' => 258, 'role_id' => 2],
            ['permission_id' => 259, 'role_id' => 2],
            ['permission_id' => 260, 'role_id' => 2],
            /**
             * Componente 261-265
             */
            ['permission_id' => 261, 'role_id' => 2],
            ['permission_id' => 262, 'role_id' => 2],
            ['permission_id' => 263, 'role_id' => 2],
            ['permission_id' => 264, 'role_id' => 2],
            ['permission_id' => 265, 'role_id' => 2],
            /**
             * Detalle Materia Malla 266-270
             */
            ['permission_id' => 266, 'role_id' => 2],
            ['permission_id' => 267, 'role_id' => 2],
            ['permission_id' => 268, 'role_id' => 2],
            ['permission_id' => 269, 'role_id' => 2],
            ['permission_id' => 270, 'role_id' => 2],
            /**
             * Componente Aprendizaje 271-275
             */
            ['permission_id' => 271, 'role_id' => 2],
            ['permission_id' => 272, 'role_id' => 2],
            ['permission_id' => 273, 'role_id' => 2],
            ['permission_id' => 274, 'role_id' => 2],
            ['permission_id' => 275, 'role_id' => 2],
            /**
             * Modelo Calificacion 276-280
             */
            ['permission_id' => 276, 'role_id' => 2],
            ['permission_id' => 277, 'role_id' => 2],
            ['permission_id' => 278, 'role_id' => 2],
            ['permission_id' => 279, 'role_id' => 2],
            ['permission_id' => 280, 'role_id' => 2],
            /**
             * Convenios 281-286
             */
            ['permission_id' => 281, 'role_id' => 2],
            ['permission_id' => 282, 'role_id' => 2],
            ['permission_id' => 283, 'role_id' => 2],
            ['permission_id' => 284, 'role_id' => 2],
            ['permission_id' => 285, 'role_id' => 2],
            ['permission_id' => 286, 'role_id' => 2],
            /**
             * Areas 287-291
             */
            ['permission_id' => 287, 'role_id' => 2],
            ['permission_id' => 288, 'role_id' => 2],
            ['permission_id' => 289, 'role_id' => 2],
            ['permission_id' => 290, 'role_id' => 2],
            ['permission_id' => 291, 'role_id' => 2],
            /**
             * Areas 292-296
             */
            ['permission_id' => 292, 'role_id' => 2],
            ['permission_id' => 293, 'role_id' => 2],
            ['permission_id' => 294, 'role_id' => 2],
            ['permission_id' => 295, 'role_id' => 2],
            ['permission_id' => 296, 'role_id' => 2],
            /**
             * Colaboradores 297-298
             */
            ['permission_id' => 297, 'role_id' => 2],
            ['permission_id' => 298, 'role_id' => 2],
            /**
             * Nivel Educativo Aula 299-303
             */
            ['permission_id' => 299, 'role_id' => 2],
            ['permission_id' => 300, 'role_id' => 2],
            ['permission_id' => 301, 'role_id' => 2],
            ['permission_id' => 302, 'role_id' => 2],
            ['permission_id' => 303, 'role_id' => 2],
            /**
             * Actualizar Foto Estudiante 304
             */
            ['permission_id' => 304, 'role_id' => 2],
            /**
             * Horas Colaborador 305-309
             */
            ['permission_id' => 305, 'role_id' => 2],
            ['permission_id' => 306, 'role_id' => 2],
            ['permission_id' => 307, 'role_id' => 2],
            ['permission_id' => 308, 'role_id' => 2],
            ['permission_id' => 309, 'role_id' => 2],
            /**
             * Resumen Horas 310-314
             */
            ['permission_id' => 310, 'role_id' => 2],
            ['permission_id' => 311, 'role_id' => 2],
            ['permission_id' => 312, 'role_id' => 2],
            ['permission_id' => 313, 'role_id' => 2],
            ['permission_id' => 314, 'role_id' => 2],
            /**
             * Colaboradores 315-317
             */
            ['permission_id' => 315, 'role_id' => 2],
            ['permission_id' => 316, 'role_id' => 2],
            ['permission_id' => 317, 'role_id' => 2],
            /**
             * Tipo Reportes 318-322
             */
            ['permission_id' => 318, 'role_id' => 2],
            ['permission_id' => 319, 'role_id' => 2],
            ['permission_id' => 320, 'role_id' => 2],
            ['permission_id' => 321, 'role_id' => 2],
            ['permission_id' => 322, 'role_id' => 2],
            /**
             * Permisos 323
             * (Solo listar y obtener)
             */
            ['permission_id' => 323, 'role_id' => 2],
            /**
             * Cursos 324-328
             */
            ['permission_id' => 324, 'role_id' => 2],
            ['permission_id' => 325, 'role_id' => 2],
            ['permission_id' => 326, 'role_id' => 2],
            ['permission_id' => 327, 'role_id' => 2],
            ['permission_id' => 328, 'role_id' => 2],
            /**
             * Nivel Carrera Materia 329-333
             */
            ['permission_id' => 329, 'role_id' => 2],
            ['permission_id' => 330, 'role_id' => 2],
            ['permission_id' => 331, 'role_id' => 2],
            ['permission_id' => 332, 'role_id' => 2],
            ['permission_id' => 333, 'role_id' => 2],
            /**
             * Periodo 334
             */
            ['permission_id' => 334, 'role_id' => 2],
            /**
             * Campus 335
             */
            ['permission_id' => 335, 'role_id' => 2],
            /**
             * Tipo Solicitudes 336-341
             */
            ['permission_id' => 336, 'role_id' => 2],
            ['permission_id' => 337, 'role_id' => 2],
            ['permission_id' => 338, 'role_id' => 2],
            ['permission_id' => 339, 'role_id' => 2],
            ['permission_id' => 340, 'role_id' => 2],
            ['permission_id' => 341, 'role_id' => 2],
            /**
             * Solicitudes 342-346
             */
            ['permission_id' => 342, 'role_id' => 2],
            ['permission_id' => 343, 'role_id' => 2],
            ['permission_id' => 344, 'role_id' => 2],
            ['permission_id' => 345, 'role_id' => 2],
            ['permission_id' => 346, 'role_id' => 2],
            /**
             * Tipo Solicitudes Estado 352-356
             */
            ['permission_id' => 352, 'role_id' => 2],
            ['permission_id' => 353, 'role_id' => 2],
            ['permission_id' => 354, 'role_id' => 2],
            ['permission_id' => 355, 'role_id' => 2],
            ['permission_id' => 356, 'role_id' => 2],
            /**
             * Grupo Area 357-362
             */
            ['permission_id' => 357, 'role_id' => 2],
            ['permission_id' => 358, 'role_id' => 2],
            ['permission_id' => 359, 'role_id' => 2],
            ['permission_id' => 360, 'role_id' => 2],
            ['permission_id' => 361, 'role_id' => 2],
            ['permission_id' => 362, 'role_id' => 2],
            /**
             * Etapa Periodo 363-364
             */
            ['permission_id' => 363, 'role_id' => 2],
            ['permission_id' => 364, 'role_id' => 2],
            /**
             * Aula 365
             */
            ['permission_id' => 365, 'role_id' => 2],
            /**
             * Homologacion Externa 366-370
             */
            ['permission_id' => 366, 'role_id' => 2],
            ['permission_id' => 367, 'role_id' => 2],
            ['permission_id' => 368, 'role_id' => 2],
            ['permission_id' => 369, 'role_id' => 2],
            ['permission_id' => 370, 'role_id' => 2],
            /**
             * Materia Institucion 371-375
             */
            ['permission_id' => 371, 'role_id' => 2],
            ['permission_id' => 372, 'role_id' => 2],
            ['permission_id' => 373, 'role_id' => 2],
            ['permission_id' => 374, 'role_id' => 2],
            ['permission_id' => 375, 'role_id' => 2],
            /**
             * Cursos 376-381
             */
            ['permission_id' => 376, 'role_id' => 2],
            ['permission_id' => 377, 'role_id' => 2],
            ['permission_id' => 378, 'role_id' => 2],
            ['permission_id' => 379, 'role_id' => 2],
            ['permission_id' => 380, 'role_id' => 2],
            ['permission_id' => 381, 'role_id' => 2],
            /**
             * Aula Nivel Educativo 382
             */
            ['permission_id' => 382, 'role_id' => 2],
            /**
             * Malla 383
             */
            ['permission_id' => 383, 'role_id' => 2],
        ]);

        /**
         *
         *
         *
         * Permisos de RRHH
         *
         *
         *
         */
        DB::connection('tenant')->table('role_has_permissions')->insert([
            /**
             * Colaboradores 297-298 // 315-317
             */
            ['permission_id' => 297, 'role_id' => 16],
            ['permission_id' => 298, 'role_id' => 16],
            ['permission_id' => 315, 'role_id' => 16],
            ['permission_id' => 316, 'role_id' => 16],
            ['permission_id' => 317, 'role_id' => 16],
            /**
             * Cargo 254-260
             */
            ['permission_id' => 254, 'role_id' => 16],
            ['permission_id' => 255, 'role_id' => 16],
            ['permission_id' => 256, 'role_id' => 16],
            ['permission_id' => 257, 'role_id' => 16],
            ['permission_id' => 258, 'role_id' => 16],
            ['permission_id' => 259, 'role_id' => 16],
            ['permission_id' => 260, 'role_id' => 16],
            /**
             * Departamentos 292-296
             */
            ['permission_id' => 292, 'role_id' => 16],
            ['permission_id' => 293, 'role_id' => 16],
            ['permission_id' => 294, 'role_id' => 16],
            ['permission_id' => 295, 'role_id' => 16],
            ['permission_id' => 296, 'role_id' => 16],
        ]);

        /**
         *
         *
         *
         * Permisos de Docente
         *
         *
         *
         */
        DB::connection('tenant')->table('role_has_permissions')->insert([
            /**
             * Estudiante 252
             */
            ['permission_id' => 252, 'role_id' => 17],
        ]);

        /**
         *
         *
         *
         * Permisos de Finanza
         *
         *
         *
         */
        DB::connection('tenant')->table('role_has_permissions')->insert([
            /**
             * Grupo Economico 145-149
             */
            ['permission_id' => 145, 'role_id' => 18],
            ['permission_id' => 146, 'role_id' => 18],
            ['permission_id' => 147, 'role_id' => 18],
            ['permission_id' => 148, 'role_id' => 18],
            ['permission_id' => 149, 'role_id' => 18],
        ]);
    }
}
