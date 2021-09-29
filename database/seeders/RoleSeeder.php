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
            ['name' => 'SUPERADMINISTRADOR', 'description' => 'Usuario superadministrador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'ADMINISTRADOR', 'description' => 'Rol administrador', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'SOPORTE', 'description' => 'Rol de soporte', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'VICERRECTORADO', 'description' => 'Rol de soporte', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'POSTGRADO', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'BIENESTAR ESTUDIANTIL', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'PLANIFICACION', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'SECRETARIA', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'ECOTEC INTERNATIONAL', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'VINCULACION', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'INVESTIGACION', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'DECANO', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'ADMISIONES', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'COORD. ACADEMICA', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'IDIOMA', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
            ['name' => 'RECURSOS HUMANOS', 'description' => '', 'guard_name' => 'api', 'status_id' => 1],
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
                'parent_name' => 'profiles'
            ],
            [
                'name' => 'profiles-obtener-perfil',
                'alias' => 'Obtener perfil',
                'description' => 'Obtener un perfil por su identificador único',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles'
            ],
            [
                'name' => 'profiles-crear-perfil',
                'alias' => 'Crear perfil',
                'description' => 'Agregar un nuevo perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles'
            ],
            [
                'name' => 'profiles-actualizar-perfil',
                'alias' => 'Actualizar perfil',
                'description' => 'Actualizar un perfil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles'
            ],
            [
                'name' => 'profiles-borrar-un-perfil',
                'alias' => 'Borrar un perfil',
                'description' => 'Borrar un perfil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles'
            ],
            [
                'name' => 'profiles-listar-usuarios-por-perfil',
                'alias' => 'Listar usuarios por perfil',
                'description' => 'Listar todos los usuarios por el identificador único del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'profiles'
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
                'parent_name' => 'roles'
            ],
            [
                'name' => 'roles-obtener-rol',
                'alias' => 'Obtener un rol',
                'description' => 'Obtener un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles'
            ],
            [
                'name' => 'roles-crear-rol',
                'alias' => 'Crear un rol',
                'description' => 'Agregar un nuevo rol',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles'
            ],
            [
                'name' => 'roles-actualizar-rol',
                'alias' => 'Actualizar un rol',
                'description' => 'Actualizar un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles'
            ],
            [
                'name' => 'roles-borrar-rol',
                'alias' => 'Borrar un rol',
                'description' => 'Borrar un rol por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'roles'
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
                'parent_name' => 'permissions'
            ],
            [
                'name' => 'permissions-obtener-permiso',
                'alias' => 'Obtener un permiso',
                'description' => 'Obtener un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions'
            ],
            [
                'name' => 'permissions-crear-permiso',
                'alias' => 'Crear un permiso',
                'description' => 'Agregar un nuevo permiso',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions'
            ],
            [
                'name' => 'permissions-actualizar-permiso',
                'alias' => 'Actualizar un permiso',
                'description' => 'Actualizar un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions'
            ],
            [
                'name' => 'permissions-borrar-permiso',
                'alias' => 'Borrar un permiso',
                'description' => 'Borrar un permiso por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'permissions'
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
                'parent_name' => 'companies'
            ],
            [
                'name' => 'companies-obtener-compania',
                'alias' => 'Obtener una compañia',
                'description' => 'Obtener una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies'
            ],
            [
                'name' => 'companies-crear-compania',
                'alias' => 'Crear una compañia',
                'description' => 'Agregar una nueva compañia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies'
            ],
            [
                'name' => 'companies-actualizar-compania',
                'alias' => 'Actualizar una compañia',
                'description' => 'Actualizar una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies'
            ],
            [
                'name' => 'companies-borrar-compania',
                'alias' => 'Borrar una compañia',
                'description' => 'Borrar una compañia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'companies'
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
                'parent_name' => 'campus'
            ],
            [
                'name' => 'campus-obtener-sede',
                'alias' => 'Obtener una sede',
                'description' => 'Obtener una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus'
            ],
            [
                'name' => 'campus-crear-sede',
                'alias' => 'Crear una sede',
                'description' => 'Agregar una nueva sede',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus'
            ],
            [
                'name' => 'campus-actualizar-sede',
                'alias' => 'Actualizar una sede',
                'description' => 'Actualizar una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus'
            ],
            [
                'name' => 'campus-borrar-sede',
                'alias' => 'Borrar una sede',
                'description' => 'Borrar una sede por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'campus'
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
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-mostrar-perfil-especifico-por-usuario',
                'alias' => 'Mostrar perfil específico por usuario',
                'description' => 'Mostrar en detalle los datos de un perfil por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-guardar-perfil-por-usuario',
                'alias' => 'Guardar perfil por usuario',
                'description' => 'Guardar perfil por el identificador único del usuario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-actualizar-perfil-por-usuario',
                'alias' => 'Actualizar perfil por usuario',
                'description' => 'Cambiar un perfil existente usando el identificador único del usuario por el identificador de perfil a asociar',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-borrar-perfiles-por-usuario',
                'alias' => 'Borrar perfiles por usuario',
                'description' => 'Borrar todos los perfiles asociados a un usuario por el identificador único',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-borrar-perfil-especifico-por-usuario',
                'alias' => 'Borrar perfil específico por usuario',
                'description' => 'Borrar un perfil asociados a un usuario por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-listar-roles-por-usuario',
                'alias' => 'Listar roles por usuario',
                'description' => 'Listar todos los roles por el identificador único del usuario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-listar-roles-por-usuario-y-perfil',
                'alias' => 'Listar roles por usuario y perfil',
                'description' => 'Listar roles por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-sincronizar-roles-por-usuario-y-perfil',
                'alias' => 'Sincronizar roles por usuario y perfil',
                'description' => 'Sincronizar roles por el identificador único del usuario y del perfil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
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
                'parent_name' => 'parallels'
            ],
            [
                'name' => 'parallels-obtener-paralelo',
                'alias' => 'Obtener un paralelo',
                'description' => 'Obtener un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels'
            ],
            [
                'name' => 'parallels-crear-paralelo',
                'alias' => 'Crear un paralelo',
                'description' => 'Agregar un nuevo paralelo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels'
            ],
            [
                'name' => 'parallels-actualizar-paralelo',
                'alias' => 'Actualizar un paralelo',
                'description' => 'Actualizar un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels'
            ],
            [
                'name' => 'parallels-borrar-paralelo',
                'alias' => 'Borrar un paralelo',
                'description' => 'Borrar un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels'
            ],
            [
                'name' => 'parallels-activar-paralelo',
                'alias' => 'Activar un paralelo',
                'description' => 'Activa un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels'
            ],
            [
                'name' => 'parallels-desactivar-paralelo',
                'alias' => 'Desactivar un paralelo',
                'description' => 'Desactiva un paralelo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'parallels'
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
                'parent_name' => 'classrooms'
            ],
            [
                'name' => 'classrooms-obtener-aula',
                'alias' => 'Obtener un aula',
                'description' => 'Obtener una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms'
            ],
            [
                'name' => 'classrooms-crear-aula',
                'alias' => 'Crear un aula',
                'description' => 'Agregar una nueva aula',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms'
            ],
            [
                'name' => 'classrooms-actualizar-aula',
                'alias' => 'Actualizar un aula',
                'description' => 'Actualizar una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms'
            ],
            [
                'name' => 'classrooms-borrar-aula',
                'alias' => 'Borrar un aula',
                'description' => 'Borrar una aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms'
            ],
            [
                'name' => 'classrooms-activar-aula',
                'alias' => 'Activar un aula',
                'description' => 'Activa un aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms'
            ],
            [
                'name' => 'classrooms-desactivar-aula',
                'alias' => 'Desactivar un aula',
                'description' => 'Desactiva un aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classrooms'
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
                'parent_name' => 'pensums'
            ],
            [
                'name' => 'pensums-obtener-pensum',
                'alias' => 'Obtener un pemsun',
                'description' => 'Obtener un pemsun por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums'
            ],
            [
                'name' => 'pensums-crear-pensum',
                'alias' => 'Crear un pensum',
                'description' => 'Agregar un nuevo pensum',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums'
            ],
            [
                'name' => 'pensums-actualizar-pensum',
                'alias' => 'Actualizar un pensum',
                'description' => 'Actualizar un pensum por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums'
            ],
            [
                'name' => 'pensums-borrar-pensum',
                'alias' => 'Borrar un pensum',
                'description' => 'Borrar un pensum por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'pensums'
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
                'parent_name' => 'stages'
            ],
            [
                'name' => 'stages-obtener-etapa',
                'alias' => 'Obtener una etapa',
                'description' => 'Obtener un pemsun por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages'
            ],
            [
                'name' => 'stages-crear-etapa',
                'alias' => 'Crear una etapa',
                'description' => 'Agregar una nueva etapa',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages'
            ],
            [
                'name' => 'stages-actualizar-etapa',
                'alias' => 'Actualizar una etapa',
                'description' => 'Actualizar una etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages'
            ],
            [
                'name' => 'stages-borrar-etapa',
                'alias' => 'Borrar una etapa',
                'description' => 'Borrar una etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'stages'
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
                'parent_name' => 'typePeriods'
            ],
            [
                'name' => 'typePeriods-obtener-tipoPeriodo',
                'alias' => 'Obtener un tipo de periodo',
                'description' => 'Obtener un tipo de periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods'
            ],
            [
                'name' => 'typePeriods-crear-tipoPeriodo',
                'alias' => 'Crear un tipo de periodo',
                'description' => 'Agregar un tipo de periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods'
            ],
            [
                'name' => 'typePeriods-actualizar-tipoPeriodo',
                'alias' => 'Actualizar un tipo de periodo',
                'description' => 'Actualizar un tipo de periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods'
            ],
            [
                'name' => 'typePeriods-borrar-tipoPeriodo',
                'alias' => 'Borrar un tipo de periodo',
                'description' => 'Borrar un tipo de periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typePeriods'
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
                'parent_name' => 'meshs'
            ],
            [
                'name' => 'meshs-obtener-malla',
                'alias' => 'Obtener una malla',
                'description' => 'Obtener una malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs'
            ],
            [
                'name' => 'meshs-crear-mallas',
                'alias' => 'Crear una malla',
                'description' => 'Agregar una nueva malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs'
            ],
            [
                'name' => 'meshs-actualizar-mallas',
                'alias' => 'Actualizar una malla',
                'description' => 'Actualizar una malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs'
            ],
            [
                'name' => 'meshs-borrar-malla',
                'alias' => 'Borrar una malla',
                'description' => 'Borrar una malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'meshs'
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
                'parent_name' => 'typeCalifications'
            ],
            [
                'name' => 'type-califications-obtener-type-calification',
                'alias' => 'Obtener un tipo de calificacion',
                'description' => 'Obtener un tipo de calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications'
            ],
            [
                'name' => 'type-califications-crear-type-calification',
                'alias' => 'Crear un tipo calificacion',
                'description' => 'Agregar un nuevo tipo calificacion',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications'
            ],
            [
                'name' => 'type-califications-actualizar-type-calification',
                'alias' => 'Actualizar un tipo calificacion',
                'description' => 'Actualizar un tipo calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications'
            ],
            [
                'name' => 'type-califications-borrar-type-calification',
                'alias' => 'Borrar un tipo calificacion',
                'description' => 'Borrar un tipo calificacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeCalifications'
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
                'parent_name' => 'typeMatters'
            ],
            [
                'name' => 'type-matters-obtener-type-matter',
                'alias' => 'Obtener un tipo de materia',
                'description' => 'Obtener un tipo de materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters'
            ],
            [
                'name' => 'type-matters-crear-type-matter',
                'alias' => 'Crear un tipo materia',
                'description' => 'Agregar un nuevo tipo materia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters'
            ],
            [
                'name' => 'type-matters-actualizar-type-matter',
                'alias' => 'Actualizar un tipo materia',
                'description' => 'Actualizar un tipo materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters'
            ],
            [
                'name' => 'type-matters-borrar-type-matter',
                'alias' => 'Borrar un tipo materia',
                'description' => 'Borrar un tipo materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeMatters'
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
                'parent_name' => 'matters'
            ],
            [
                'name' => 'matters-obtener-matter',
                'alias' => 'Obtener una materia',
                'description' => 'Obtener una materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters'
            ],
            [
                'name' => 'matters-crear-matter',
                'alias' => 'Crear una materia',
                'description' => 'Agregar una nueva materia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters'
            ],
            [
                'name' => 'matters-actualizar-matter',
                'alias' => 'Actualizar una materia',
                'description' => 'Actualizar una materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters'
            ],
            [
                'name' => 'matters-borrar-matter',
                'alias' => 'Borrar una materia',
                'description' => 'Borrar una materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matters'
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
                'parent_name' => 'periodStages'
            ],
            [
                'name' => 'periodStages-obtener-periodoEtapa',
                'alias' => 'Obtener un registro asociado periodo_etapa',
                'description' => 'Obtener una relacion periodo_etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages'
            ],
            [
                'name' => 'periodStages-crear-periodoEtapa',
                'alias' => 'Crear un registro asociado periodo_etapa',
                'description' => 'Agregar un registro asociado de periodo_etapa',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages'
            ],
            [
                'name' => 'periodStages-actualizar-periodoEtapa',
                'alias' => 'Actualizar un registro asociado periodo_etapa',
                'description' => 'Actualizar un registro asociado de periodo_etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages'
            ],
            [
                'name' => 'periodStages-borrar-periodoEtapa',
                'alias' => 'Borrar un registro asociado de periodo_etapa',
                'description' => 'Borrar un registro asociado de periodo_etapa por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodStages'
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
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-change-password',
                'alias' => 'Cambiar la contraseña del perfil',
                'description' => 'Cambiar la contraseña de un usuario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
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
                'parent_name' => 'periods'
            ],
            [
                'name' => 'periods-obtener-periodo',
                'alias' => 'Obtener periodo',
                'description' => 'Obtener un periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods'
            ],
            [
                'name' => 'periods-crear-periodo',
                'alias' => 'Crear periodo',
                'description' => 'Agregar un periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods'
            ],
            [
                'name' => 'periods-actualizar-periodo',
                'alias' => 'Actualizar periodo',
                'description' => 'Actualizar un periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods'
            ],
            [
                'name' => 'periods-borrar-periodo',
                'alias' => 'Borrar periodo',
                'description' => 'Borrar un periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods'
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
                'parent_name' => 'mattermesh'
            ],
            [
                'name' => 'mattermesh-obtener-materias-mallas',
                'alias' => 'Obtener un registro relacionado matter_mesh',
                'description' => 'Obtener materias relacionadas con el identificador de una malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mattermesh'
            ],
            [
                'name' => 'mattermesh-crear-materias-mallas',
                'alias' => 'Crear un registro relacionado matter_mesh',
                'description' => 'Agregar un registro relacional entre materia y malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mattermesh'
            ],
            [
                'name' => 'mattermesh-actualizar-materias-mallas',
                'alias' => 'Actualizar un registro relacionado matter_mesh',
                'description' => 'Actualizar un registro relacional entre materia y malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mattermesh'
            ],
            [
                'name' => 'mattermesh-borrar-materias-mallas',
                'alias' => 'Borrar un registro relacionado matter_mesh',
                'description' => 'Borrar un registro relacional entre materia y malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mattermesh'
            ],
            /**
             * Ofertas 102-106
             */
            [
                'name' => 'offers-listar-ofertas',
                'alias' => 'Listar ofertas',
                'description' => 'Listar todas las ofertas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers'
            ],
            [
                'name' => 'offers-obtener-oferta',
                'alias' => 'Obtener oferta',
                'description' => 'Obtener una oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers'
            ],
            [
                'name' => 'offers-crear-oferta',
                'alias' => 'Crear oferta',
                'description' => 'Agregar una oferta',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers'
            ],
            [
                'name' => 'offers-actualizar-oferta',
                'alias' => 'Actualizar oferta',
                'description' => 'Actualizar una oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers'
            ],
            [
                'name' => 'offers-borrar-oferta',
                'alias' => 'Borrar oferta',
                'description' => 'Borrar una oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offers'
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
                'parent_name' => 'hourhand'
            ],
            [
                'name' => 'hourhands-obtener-horario',
                'alias' => 'Obtener horario',
                'description' => 'Obtener un horario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand'
            ],
            [
                'name' => 'hourhands-crear-horario',
                'alias' => 'Crear horario',
                'description' => 'Agregar un horario',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand'
            ],
            [
                'name' => 'hourhands-actualizar-horario',
                'alias' => 'Actualizar horario',
                'description' => 'Actualizar un horario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand'
            ],
            [
                'name' => 'hourhands-borrar-horario',
                'alias' => 'Borrar horario',
                'description' => 'Borrar un horario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'hourhand'
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
                'parent_name' => 'institutes'
            ],
            [
                'name' => 'institutes-obtener-instituto',
                'alias' => 'Obtener instituto',
                'description' => 'Obtener un instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes'
            ],
            [
                'name' => 'institutes-crear-instituto',
                'alias' => 'Crear instituto',
                'description' => 'Agregar un instituto',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes'
            ],
            [
                'name' => 'institutes-actualizar-instituto',
                'alias' => 'Actualizar instituto',
                'description' => 'Actualizar un instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes'
            ],
            [
                'name' => 'institutes-eliminar-instituto',
                'alias' => 'Borrar instituto',
                'description' => 'Borrar un instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'institutes'
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
                'parent_name' => 'instituteType'
            ],
            [
                'name' => 'institutetype-obtener-tipo-de-instituto',
                'alias' => 'Obtener tipo instituto',
                'description' => 'Obtener un tipo de instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType'
            ],
            [
                'name' => 'institutetype-crear-tipo-de-instituto',
                'alias' => 'Crear tipo instituto',
                'description' => 'Agregar un tipo de instituto',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType'
            ],
            [
                'name' => 'institutetype-actualizar-tipo-de-instituto',
                'alias' => 'Actualizar tipo instituto',
                'description' => 'Actualizar un tipo de instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType'
            ],
            [
                'name' => 'institutetype-eliminar-tipo-de-instituto',
                'alias' => 'Borrar tipo instituto',
                'description' => 'Borrar un tipo de instituto por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'instituteType'
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
                'parent_name' => 'mail'
            ],
            [
                'name' => 'mails-obtener-mail',
                'alias' => 'Obtener mail',
                'description' => 'Obtener un mail por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mail'
            ],
            [
                'name' => 'mails-actualizar-mail',
                'alias' => 'Actualizar mail',
                'description' => 'Actualizar un mail por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mail'
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
                'parent_name' => 'matterStatus'
            ],
            [
                'name' => 'matter-status-obtener-matter-status',
                'alias' => 'Obtener matter_status',
                'description' => 'Obtener un estado materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus'
            ],
            [
                'name' => 'matter-status-crear-matter-status',
                'alias' => 'Crear matter_status',
                'description' => 'Agregar un estado materia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus'
            ],
            [
                'name' => 'matter-status-actualizar-matter-status',
                'alias' => 'Actualizar matter_status',
                'description' => 'Actualizar un estado materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus'
            ],
            [
                'name' => 'matter-status-borrar-matter-status',
                'alias' => 'Borrar matter_status',
                'description' => 'Borrar un estado materia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterStatus'
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
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-actualizar-usuario',
                'alias' => 'Actualizar usuario',
                'description' => 'Actualizar un usuario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-borrar-usuario',
                'alias' => 'Borrar usuario',
                'description' => 'Borrar un usuario por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
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
                'parent_name' => 'educationLevel'
            ],
            [
                'name' => 'education-levels-obtener-nivel-educativo',
                'alias' => 'Obtener nivel educativo',
                'description' => 'Obtener un nivel educativo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel'
            ],
            [
                'name' => 'education-levels-crear-nivel-educativo',
                'alias' => 'Crear nivel educativo',
                'description' => 'Agregar un nivel educativo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel'
            ],
            [
                'name' => 'education-levels-actualizar-nivel-educativo',
                'alias' => 'Actualizar nivel educativo',
                'description' => 'Actualizar un nivel educativo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel'
            ],
            [
                'name' => 'education-levels-borrar-nivel-educativo',
                'alias' => 'Borrar nivel educativo',
                'description' => 'Borrar un nivel ecucativo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'educationLevel'
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
                'parent_name' => 'typeStudent'
            ],
            [
                'name' => 'type_students-obtener-tipo-estudiante',
                'alias' => 'Obtener tipo de estudiante',
                'description' => 'Obtener un tipo de estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudent'
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
                'parent_name' => 'typeDocument'
            ],
            [
                'name' => 'type-document-obtener-tipo-documento',
                'alias' => 'Obtener tipo documento',
                'description' => 'Obtener un tipo de documento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument'
            ],
            [
                'name' => 'type-document-crear-tipo-documento',
                'alias' => 'Crear tipo documento',
                'description' => 'Agregar un tipo de documento',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument'
            ],
            [
                'name' => 'type-document-actualizar-tipo-documento',
                'alias' => 'Actualizar tipo documento',
                'description' => 'Actualizar un tipo de documento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument'
            ],
            [
                'name' => 'type-document-borrar-tipo-documento',
                'alias' => 'Borrar tipo documento',
                'description' => 'Borrar un tipo documento por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDocument'
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
                'parent_name' => 'economicGroup'
            ],
            [
                'name' => 'economic_group-obtener-grupo-economico',
                'alias' => 'Obtener grupo economico',
                'description' => 'Obtener un grupo economico por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup'
            ],
            [
                'name' => 'economic_group-crear-grupo-economico',
                'alias' => 'Crear grupo economico',
                'description' => 'Agregar un grupo economico',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup'
            ],
            [
                'name' => 'economic_group-actualizar-grupo-economico',
                'alias' => 'Actualizar grupo economico',
                'description' => 'Actualizar un grupo economico por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup'
            ],
            [
                'name' => 'economic_group-eliminar-grupo-economico',
                'alias' => 'Borrar grupo economico',
                'description' => 'Borrar un grupo economico por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'economicGroup'
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
                'parent_name' => 'typeDisability'
            ],
            [
                'name' => 'type_disability-obtener-tipo-discapacidad',
                'alias' => 'Obtener tipo discapacidad',
                'description' => 'Obtener un tipo de discapacidad por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeDisability'
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
                'parent_name' => 'bloodType'
            ],
            [
                'name' => 'blood_type-obtener-tipo-sangre',
                'alias' => 'Obtener tipo sangre',
                'description' => 'Obtener un tipo de sangre por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'bloodType'
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
                'parent_name' => 'typeEducation'
            ],
            [
                'name' => 'type_education-obtener-tipo-educacion',
                'alias' => 'Obtener tipo educacion',
                'description' => 'Obtener un tipo de educacion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeEducation'
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
                'parent_name' => 'personJob'
            ],
            [
                'name' => 'person_job-obtener-persona-trabajo',
                'alias' => 'Obtener persona trabajo',
                'description' => 'Obtener un persona trabajo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob'
            ],
            [
                'name' => 'person_job-crear-persona-trabajo',
                'alias' => 'Crear persona trabajo',
                'description' => 'Agregar un persona trabajo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob'
            ],
            [
                'name' => 'persona-asignar-trabajos-persona',
                'alias' => 'asignar trabajos persona',
                'description' => 'Asignacion masiva de trabajos a una persona',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person'
            ],
            [
                'name' => 'person_job-actualizar-persona-trabajo',
                'alias' => 'Actualizar persona trabajo',
                'description' => 'Actualizar un persona trabajo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob'
            ],
            [
                'name' => 'person_job-eliminar-persona-trabajo',
                'alias' => 'Borrar persona trabajo',
                'description' => 'Borrar un persona trabajo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'personJob'
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
                'parent_name' => 'tenant'
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
                'parent_name' => 'criteriaStudent'
            ],
            [
                'name' => 'criteria_students_records-crear-criterio-record-estudiantil',
                'alias' => 'Obtener criteria_student',
                'description' => 'Obtener un criteria_student por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent'
            ],
            [
                'name' => 'criteria_students_records-obtener-criterio-record-estudiantil',
                'alias' => 'Crear criteria_student',
                'description' => 'Agregar un criteria_student',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent'
            ],
            [
                'name' => 'criteria_students_records-actualizar-criterio-record-estudiantil',
                'alias' => 'Actualizar criteria_student',
                'description' => 'Actualizar un criteria_student por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent'
            ],
            [
                'name' => 'criteria_students_records-eliminar-criterio-record-estudiantil',
                'alias' => 'Borrar criteria_student',
                'description' => 'Borrar un criteria_student por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'criteriaStudent'
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
                'parent_name' => 'studentRecord'
            ],
            [
                'name' => 'student_records-crear-record-estudiantil',
                'alias' => 'Obtener recodr estudiantil',
                'description' => 'Obtener un record estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord'
            ],
            [
                'name' => 'student_records-obtener-record-estudiantil',
                'alias' => 'Crear recodr estudiantil',
                'description' => 'Agregar un record estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord'
            ],
            [
                'name' => 'student_records-actualizar-record-estudiantil',
                'alias' => 'Actualizar recodr estudiantil',
                'description' => 'Actualizar un record estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord'
            ],
            [
                'name' => 'student_records-eliminar-record-estudiantil',
                'alias' => 'Borrar record estudiantil',
                'description' => 'Borrar un record estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentRecord'
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
                'parent_name' => 'offerPeriod'
            ],
            [
                'name' => 'offers-obtener-periodo-por-oferta',
                'alias' => 'Obtener periodo oferta',
                'description' => 'Obtener un periodo oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerPeriod'
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
                'parent_name' => 'periodOffer'
            ],
            [
                'name' => 'periods-borrar-ofertas-por-periodo',
                'alias' => 'eliminar oferta periodo',
                'description' => 'borrar una oferta periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periodOffer'
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
                'parent_name' => 'person'
            ],
            [
                'name' => 'persons-obtener-person',
                'alias' => 'Obtener persona',
                'description' => 'Obtener una persona por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person'
            ],
            [
                'name' => 'persons-crear-person',
                'alias' => 'Crear persona',
                'description' => 'Agregar una persona',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person'
            ],
            [
                'name' => 'persons-actualizar-person',
                'alias' => 'Actualizar persona',
                'description' => 'Actualizar una persona por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person'
            ],
            [
                'name' => 'persons-borrar-person',
                'alias' => 'Borrar persona',
                'description' => 'Borrar una persona por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'person'
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
                'parent_name' => 'emergencyContact'
            ],
            [
                'name' => 'emergency_contact-obtener-contacto-emergencia',
                'alias' => 'Obtener contacto emergencia',
                'description' => 'Obtener un contacto de emergencia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact'
            ],
            [
                'name' => 'emergency_contact-crear-contacto-emergencia',
                'alias' => 'Crear contacto emergencia',
                'description' => 'Agregar un contacto de emergencia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact'
            ],
            [
                'name' => 'emergency_contact-actualizar-contacto-emergencia',
                'alias' => 'Actualizar contacto de emergencia',
                'description' => 'Actualizar un contacto de emergencia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact'
            ],
            [
                'name' => 'emergency_contact-eliminar-contacto-emergencia',
                'alias' => 'Borrar contacto emergencia',
                'description' => 'Borrar un contacto de emergencia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'emergencyContact'
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
                'parent_name' => 'periods'
            ],
            [
                'name' => 'periods-borrar-horarios-por-periodo',
                'alias' => 'Borrar horario periodo',
                'description' => 'Borrar un horario periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'periods'
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
                'parent_name' => 'tagStudent'
            ],
            [
                'name' => 'tags_student-obtener-etiqueta',
                'alias' => 'Obtener etiqueta estudiante',
                'description' => 'Obtener una etiqueta estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent'
            ],
            [
                'name' => 'tags_student-crear-etiqueta',
                'alias' => 'Crear etiqueta estudiante',
                'description' => 'Agregar una etiqueta de estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent'
            ],
            [
                'name' => 'tags_student-actualizar-etiqueta',
                'alias' => 'Actualizar etiqueta estudiante',
                'description' => 'Actualizar una etiqueta estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent'
            ],
            [
                'name' => 'tags_student-eliminar-etiqueta',
                'alias' => 'Borrar etiqueta estudiante',
                'description' => 'Borrar una etiqueta estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'tagStudent'
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
                'parent_name' => 'person'
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
                'parent_name' => 'catalog'
            ],
            [
                'name' => 'catalogs-obtener-catalog',
                'alias' => 'Obtener catalogo',
                'description' => 'Obtener un catalogo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog'
            ],
            [
                'name' => 'catalogs-crear-catalog',
                'alias' => 'Crear catalogo',
                'description' => 'Agregar un catalogo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog'
            ],
            [
                'name' => 'catalogs-actualizar-catalog',
                'alias' => 'Actualizar catalogo',
                'description' => 'Actualizar un catalogo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog'
            ],
            [
                'name' => 'catalogs-borrar-catalog',
                'alias' => 'Borrar catalogo',
                'description' => 'Borrar un catalogo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'catalog'
            ],
            /**
             * Documentos Estudiante 200-205
             */
            [
                'name' => 'student-document-listar-documentos-estudiantes',
                'alias' => 'Listar documento estudiante',
                'description' => 'Listar todos los documento estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument'
            ],
            [
                'name' => 'student-document-obtener-documento-estudiante',
                'alias' => 'Obtener documento estudiante',
                'description' => 'Obtener un documento estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument'
            ],
            [
                'name' => 'student-document-crear-documento-estudiante',
                'alias' => 'Crear documento estudiante',
                'description' => 'Agregar un documento estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument'
            ],
            [
                'name' => 'student-document-actualizar-documento-estudiante',
                'alias' => 'Actualizar documento estudiante',
                'description' => 'Actualizar un documento estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument'
            ],
            [
                'name' => 'student-document-borrar-documento-estudiante',
                'alias' => 'Borrar documento estudiante',
                'description' => 'Borrar un documento estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument'
            ],
            [
                'name' => 'student-document-descargar-documentos-estudiantes',
                'alias' => 'Descargar documento estudiante',
                'description' => 'Descargar un documento estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'studentDocument'
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
                'parent_name' => 'status'
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
                'parent_name' => 'mention'
            ],
            [
                'name' => 'mention-obtener-mencion',
                'alias' => 'Obtener mencion',
                'description' => 'Obtener una mencion por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'mention'
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
                'parent_name' => 'typeStudentProgram'
            ],
            [
                'name' => 'type-student-program-obtener-tipo-programa-estudiante',
                'alias' => 'Obtener tipo programa estudiante',
                'description' => 'Obtener un tipo de programa del estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram'
            ],
            [
                'name' => 'type-student-program-crear-tipo-programa-estudiante',
                'alias' => 'Crear tipo programa estudiante',
                'description' => 'Agregar un tipo de programa del estudiante estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram'
            ],
            [
                'name' => 'type-student-program-actualizar-tipo-programa-estudiante',
                'alias' => 'Actualizar tipo programa estudiante',
                'description' => 'Actualizar un tipo de programa del estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram'
            ],
            [
                'name' => 'type-student-program-borrar-tipo-programa-estudiante',
                'alias' => 'Borrar tipo programa estudiante',
                'description' => 'Borrar un tipo de programa del estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'typeStudentProgram'
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
                'parent_name' => 'relatives'
            ],
            [
                'name' => 'relatives-obtener-familiar',
                'alias' => 'Obtener familiar',
                'description' => 'Obtener un familiar por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives'
            ],
            [
                'name' => 'relatives-crear-familiar',
                'alias' => 'Crear familiar',
                'description' => 'Agregar un familiar',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives'
            ],
            [
                'name' => 'relatives-actualizar-familiar',
                'alias' => 'Actualizar familiar',
                'description' => 'Actualizar un familiar por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives'
            ],
            [
                'name' => 'relatives-borrar-familiar',
                'alias' => 'Borrar familiar',
                'description' => 'Borrar un familiar por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives'
            ],
            [
                'name' => 'relatives-obtener-familiar-por-estudiante',
                'alias' => 'Obtener familiar estudiante',
                'description' => 'Obtener un familiar por estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'relatives'
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
                'parent_name' => 'categoryStatus'
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
                'parent_name' => 'student'
            ],
            [
                'name' => 'student-crear-estudiante',
                'alias' => 'Crear estudiante',
                'description' => 'Crear un estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student'
            ],
            [
                'name' => 'student-update-estudiante',
                'alias' => 'Actualizar estudiante',
                'description' => 'Actualizar un estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student'
            ],
            [
                'name' => 'student-delete-estudiante',
                'alias' => 'Eliminar estudiante',
                'description' => 'Eliminar un estudiante por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student'
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
                'parent_name' => 'matterMesh'
            ],
            [
                'name' => 'mattermesh-listar-dependencias-por-materias-mallas',
                'alias' => 'listar dependencia materia malla',
                'description' => 'Lista todas las dependecias de materias por mallas',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'matterMesh'
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
                'parent_name' => 'person'
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
                'parent_name' => 'mesh'
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
                'parent_name' => 'simbology'
            ],
            [
                'name' => 'simbology-obtener-simbologia',
                'alias' => 'Obtener simbologia',
                'description' => 'Obtener una simbologia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology'
            ],
            [
                'name' => 'simbology-crear-simbologia',
                'alias' => 'Crear simbologia',
                'description' => 'Agregar una simbologia',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology'
            ],
            [
                'name' => 'simbology-actualizar-simbologia',
                'alias' => 'Actualizar simbologia',
                'description' => 'Actualizar una simbologia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology'
            ],
            [
                'name' => 'simbology-eliminar-simbologia',
                'alias' => 'Borrar simbologia',
                'description' => 'Borrar una simbologia por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'simbology'
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
                'parent_name' => 'offer'
            ],
            [
                'name' => 'offers-asignar-simbologias-por-oferta',
                'alias' => 'Asignar simbologia oferta',
                'description' => 'Asignacion masiva de simbologia a la oferta',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offer'
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
                'parent_name' => 'StudentRecordPrograms'
            ],
            [
                'name' => 'student-record-programs-obtener-programa-registro-estudiantil',
                'alias' => 'Obtener student-record-programs',
                'description' => 'Obtener un record de programa estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms'
            ],
            [
                'name' => 'student-record-programs-crear-programa-registro-estudiantil',
                'alias' => 'Crear student-record-programs',
                'description' => 'Agregar un record de programa estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms'
            ],
            [
                'name' => 'student-record-programs-actualizar-programa-registro-estudiantil',
                'alias' => 'Actualizar student-record-programs',
                'description' => 'Actualizar un record de programa estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms'
            ],
            [
                'name' => 'student-record-programs-borrar-programa-registro-estudiantil',
                'alias' => 'Borrar student-record-programs',
                'description' => 'Borrar un record de programa estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPrograms'
            ],
            [
                'name' => 'student-records-and-type-student-programs-listar-programa-registro-estudiantil-asociado-record-estudiante',
                'alias' => 'listar student-record-programs-registro-estudiantil',
                'description' => 'Listar todos los record de programa estudiantil y registros asociados',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecord'
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
                'parent_name' => 'StudentRecordPeriod'
            ],
            [
                'name' => 'student-records-period-obtener-student-record-period',
                'alias' => 'Obtener student-record-period',
                'description' => 'Obtener un record de periodo estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod'
            ],
            [
                'name' => 'student-records-period-crear-student-record-period',
                'alias' => 'Crear student-record-period',
                'description' => 'Agregar un record de periodo estudiantil',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod'
            ],
            [
                'name' => 'student-records-period-actualizar-student-record-period',
                'alias' => 'Actualizar student-record-period',
                'description' => 'Actualizar un record de periodo estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod'
            ],
            [
                'name' => 'student-records-period-borrar-student-record-period',
                'alias' => 'Borrar student-record-period',
                'description' => 'Borrar un record de periodo estudiantil por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'StudentRecordPeriod'
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
                'parent_name' => 'classroomType'
            ],
            [
                'name' => 'classroomType-obtener-tipo-aula',
                'alias' => 'Obtener tipo aula',
                'description' => 'Obtener un tipo de aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType'
            ],
            [
                'name' => 'classroomType-crear-tipo-aula',
                'alias' => 'Crear tipo aula',
                'description' => 'Agregar un nuevo tipo de aula',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType'
            ],
            [
                'name' => 'classroomType-actualizar-tipo-aula',
                'alias' => 'Actualizar tipo aula',
                'description' => 'Actualizar un tipo de aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType'
            ],
            [
                'name' => 'classroomType-eliminar-tipo-aula',
                'alias' => 'Borrar tipo aula',
                'description' => 'Borrar un tipo de aula por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'classroomType'
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
                'parent_name' => 'student'
            ],
            [
                'name' => 'student-update-photo-estudiante',
                'alias' => 'Actualizar foto estudiante',
                'description' => 'Actualizar una foto de un estudiante',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'student'
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
                'parent_name' => 'position'
            ],
            [
                'name' => 'positions-obtener-cargo',
                'alias' => 'Obtener cargo',
                'description' => 'Obtener un cargo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position'
            ],
            [
                'name' => 'positions-crear-cargo',
                'alias' => 'Crear cargo',
                'description' => 'Agregar un cargo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position'
            ],
            [
                'name' => 'positions-actualizar-cargo',
                'alias' => 'Actualizar cargo',
                'description' => 'Actualizar un cargo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position'
            ],
            [
                'name' => 'positions-eliminar-cargo',
                'alias' => 'Borrar cargo',
                'description' => 'Borrar un cargo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'position'
            ],
            [
                'name' => 'users-listar-usuarios',
                'alias' => 'Listar usuarios',
                'description' => 'Listar todos los usuarios',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
            ],
            [
                'name' => 'users-obtener-usuario',
                'alias' => 'Obtener un usuario',
                'description' => 'Obtener un usuario por id',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'users'
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
                'parent_name' => 'component'
            ],
            [
                'name' => 'components-obtener-componente',
                'alias' => 'Obtener componente',
                'description' => 'Obtener un componente por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component'
            ],
            [
                'name' => 'components-crear-componente',
                'alias' => 'Crear componente',
                'description' => 'Agregar un componente',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component'
            ],
            [
                'name' => 'components-actualizar-componente',
                'alias' => 'Actualizar componente',
                'description' => 'Actualizar un componente por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component'
            ],
            [
                'name' => 'components-borrar-componente',
                'alias' => 'Borrar componente',
                'description' => 'Borrar un componente por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'component'
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
                'parent_name' => 'detailMatterMesh'
            ],
            [
                'name' => 'details_matter_mesh-obtener-detalle-materiamalla',
                'alias' => 'Obtener detalle materia malla',
                'description' => 'Obtener un detalle materia malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh'
            ],
            [
                'name' => 'details_matter_mesh-crear-detalle-materiamalla',
                'alias' => 'Crear detalle materia malla',
                'description' => 'Agregar un detalle materia malla',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh'
            ],
            [
                'name' => 'details_matter_mesh-actualizar-detalle-materiamalla',
                'alias' => 'Actualizar detalle materia malla',
                'description' => 'Actualizar un detalle materia malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh'
            ],
            [
                'name' => 'details_matter_mesh-borrar-detalle-materiamalla',
                'alias' => 'Borrar detalle materia malla',
                'description' => 'Borrar un detalle materia malla por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'detailMatterMesh'
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
                'parent_name' => 'learningComponent'
            ],
            [
                'name' => 'learning_components-obtener-componente-aprendizaje',
                'alias' => 'Obtener componente aprendizaje',
                'description' => 'Obtener un componente aprendizaje por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent'
            ],
            [
                'name' => 'learning_components-crear-componente-aprendizaje',
                'alias' => 'Crear componente aprendizaje',
                'description' => 'Agregar un componente aprendizaje',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent'
            ],
            [
                'name' => 'learning_components-actualizar-componente-aprendizaje',
                'alias' => 'Actualizar componente aprendizaje',
                'description' => 'Actualizar un componente aprendizaje por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent'
            ],
            [
                'name' => 'learning_components-borrar-componente-aprendizaje',
                'alias' => 'Borrar componente aprendizaje',
                'description' => 'Borrar un componente aprendizaje por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'learningComponent'
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
             * Tipos Discapacidad 150-152
             */
            ['permission_id' => 150, 'role_id' => 1],
            ['permission_id' => 151, 'role_id' => 1],
            ['permission_id' => 152, 'role_id' => 1],
            ['permission_id' => 153, 'role_id' => 1],
            ['permission_id' => 154, 'role_id' => 1],
            ['permission_id' => 155, 'role_id' => 1],
            ['permission_id' => 156, 'role_id' => 1],
            ['permission_id' => 157, 'role_id' => 1],
            ['permission_id' => 158, 'role_id' => 1],
            ['permission_id' => 159, 'role_id' => 1],
            ['permission_id' => 160, 'role_id' => 1],
            ['permission_id' => 161, 'role_id' => 1],
            ['permission_id' => 162, 'role_id' => 1],
            ['permission_id' => 163, 'role_id' => 1],
            ['permission_id' => 164, 'role_id' => 1],
            ['permission_id' => 165, 'role_id' => 1],
            ['permission_id' => 166, 'role_id' => 1],
            ['permission_id' => 167, 'role_id' => 1],
            ['permission_id' => 168, 'role_id' => 1],
            ['permission_id' => 169, 'role_id' => 1],
            ['permission_id' => 170, 'role_id' => 1],
            ['permission_id' => 171, 'role_id' => 1],
            ['permission_id' => 172, 'role_id' => 1],
            ['permission_id' => 173, 'role_id' => 1],
            ['permission_id' => 174, 'role_id' => 1],
            ['permission_id' => 175, 'role_id' => 1],
            ['permission_id' => 176, 'role_id' => 1],
            ['permission_id' => 177, 'role_id' => 1],
            ['permission_id' => 178, 'role_id' => 1],
            ['permission_id' => 179, 'role_id' => 1],
            ['permission_id' => 180, 'role_id' => 1],
            ['permission_id' => 181, 'role_id' => 1],
            ['permission_id' => 182, 'role_id' => 1],
            ['permission_id' => 183, 'role_id' => 1],
            ['permission_id' => 184, 'role_id' => 1],
            ['permission_id' => 185, 'role_id' => 1],
            ['permission_id' => 186, 'role_id' => 1],
            ['permission_id' => 187, 'role_id' => 1],
            ['permission_id' => 188, 'role_id' => 1],
            ['permission_id' => 189, 'role_id' => 1],
            ['permission_id' => 190, 'role_id' => 1],
            ['permission_id' => 191, 'role_id' => 1],
            ['permission_id' => 192, 'role_id' => 1],
            ['permission_id' => 193, 'role_id' => 1],
            ['permission_id' => 194, 'role_id' => 1],
            ['permission_id' => 195, 'role_id' => 1],
            ['permission_id' => 196, 'role_id' => 1],
            ['permission_id' => 197, 'role_id' => 1],
            ['permission_id' => 198, 'role_id' => 1],
            ['permission_id' => 199, 'role_id' => 1],
            ['permission_id' => 200, 'role_id' => 1],
            ['permission_id' => 201, 'role_id' => 1],
            ['permission_id' => 202, 'role_id' => 1],
            ['permission_id' => 203, 'role_id' => 1],
            ['permission_id' => 204, 'role_id' => 1],
            ['permission_id' => 205, 'role_id' => 1],
            ['permission_id' => 206, 'role_id' => 1],
            ['permission_id' => 207, 'role_id' => 1],
            ['permission_id' => 208, 'role_id' => 1],
            ['permission_id' => 209, 'role_id' => 1],
            ['permission_id' => 210, 'role_id' => 1],
            ['permission_id' => 211, 'role_id' => 1],
            ['permission_id' => 212, 'role_id' => 1],
            ['permission_id' => 213, 'role_id' => 1],
            ['permission_id' => 214, 'role_id' => 1],
            ['permission_id' => 215, 'role_id' => 1],
            ['permission_id' => 216, 'role_id' => 1],
            ['permission_id' => 217, 'role_id' => 1],
            ['permission_id' => 218, 'role_id' => 1],
            ['permission_id' => 219, 'role_id' => 1],
            ['permission_id' => 220, 'role_id' => 1],
            ['permission_id' => 221, 'role_id' => 1],
            ['permission_id' => 222, 'role_id' => 1],
            ['permission_id' => 223, 'role_id' => 1],
            ['permission_id' => 224, 'role_id' => 1],
            ['permission_id' => 225, 'role_id' => 1],
            ['permission_id' => 226, 'role_id' => 1],
            ['permission_id' => 227, 'role_id' => 1],
            ['permission_id' => 228, 'role_id' => 1],
            ['permission_id' => 229, 'role_id' => 1],
            ['permission_id' => 230, 'role_id' => 1],
            ['permission_id' => 231, 'role_id' => 1],
            ['permission_id' => 232, 'role_id' => 1],
            ['permission_id' => 233, 'role_id' => 1],
            ['permission_id' => 234, 'role_id' => 1],
            ['permission_id' => 235, 'role_id' => 1],
            ['permission_id' => 236, 'role_id' => 1],
            ['permission_id' => 237, 'role_id' => 1],
            ['permission_id' => 238, 'role_id' => 1],
            ['permission_id' => 239, 'role_id' => 1],
            ['permission_id' => 240, 'role_id' => 1],
            ['permission_id' => 241, 'role_id' => 1],
            ['permission_id' => 242, 'role_id' => 1],
            ['permission_id' => 243, 'role_id' => 1],
            ['permission_id' => 244, 'role_id' => 1],
            ['permission_id' => 245, 'role_id' => 1],
            ['permission_id' => 246, 'role_id' => 1],
            ['permission_id' => 247, 'role_id' => 1],
            ['permission_id' => 248, 'role_id' => 1],
            ['permission_id' => 249, 'role_id' => 1],
            ['permission_id' => 250, 'role_id' => 1],
            ['permission_id' => 251, 'role_id' => 1],
            ['permission_id' => 252, 'role_id' => 1],
            ['permission_id' => 253, 'role_id' => 1],
            ['permission_id' => 254, 'role_id' => 1],
            ['permission_id' => 255, 'role_id' => 1],
            ['permission_id' => 256, 'role_id' => 1],
            ['permission_id' => 257, 'role_id' => 1],
            ['permission_id' => 258, 'role_id' => 1],
            ['permission_id' => 259, 'role_id' => 1],
            ['permission_id' => 260, 'role_id' => 1],
            ['permission_id' => 261, 'role_id' => 1],
            ['permission_id' => 262, 'role_id' => 1],
            ['permission_id' => 263, 'role_id' => 1],
            ['permission_id' => 264, 'role_id' => 1],
            ['permission_id' => 265, 'role_id' => 1],
            ['permission_id' => 266, 'role_id' => 1],
            ['permission_id' => 267, 'role_id' => 1],
            ['permission_id' => 268, 'role_id' => 1],
            ['permission_id' => 269, 'role_id' => 1],
            ['permission_id' => 270, 'role_id' => 1],
            ['permission_id' => 271, 'role_id' => 1],
            ['permission_id' => 272, 'role_id' => 1],
            ['permission_id' => 273, 'role_id' => 1],
            ['permission_id' => 274, 'role_id' => 1],
            ['permission_id' => 275, 'role_id' => 1],

            /**
             *
             *
             *
             * Permisos de Administrador
             *
             *
             *
             */

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
             * Tipos Discapacidad 150-152
             */
            ['permission_id' => 150, 'role_id' => 2],
            ['permission_id' => 151, 'role_id' => 2],
            ['permission_id' => 152, 'role_id' => 2],
            ['permission_id' => 153, 'role_id' => 2],
            ['permission_id' => 154, 'role_id' => 2],
            ['permission_id' => 155, 'role_id' => 2],
            ['permission_id' => 156, 'role_id' => 2],
            ['permission_id' => 157, 'role_id' => 2],
            ['permission_id' => 158, 'role_id' => 2],
            ['permission_id' => 159, 'role_id' => 2],
            ['permission_id' => 160, 'role_id' => 2],
            ['permission_id' => 161, 'role_id' => 2],
            ['permission_id' => 163, 'role_id' => 2],
            ['permission_id' => 164, 'role_id' => 2],
            ['permission_id' => 165, 'role_id' => 2],
            ['permission_id' => 166, 'role_id' => 2],
            ['permission_id' => 167, 'role_id' => 2],
            ['permission_id' => 168, 'role_id' => 2],
            ['permission_id' => 169, 'role_id' => 2],
            ['permission_id' => 170, 'role_id' => 2],
            ['permission_id' => 171, 'role_id' => 2],
            ['permission_id' => 172, 'role_id' => 2],
            ['permission_id' => 173, 'role_id' => 2],
            ['permission_id' => 174, 'role_id' => 2],
            ['permission_id' => 175, 'role_id' => 2],
            ['permission_id' => 176, 'role_id' => 2],
            ['permission_id' => 177, 'role_id' => 2],
            ['permission_id' => 178, 'role_id' => 2],
            ['permission_id' => 179, 'role_id' => 2],
            ['permission_id' => 180, 'role_id' => 2],
            ['permission_id' => 181, 'role_id' => 2],
            ['permission_id' => 182, 'role_id' => 2],
            ['permission_id' => 183, 'role_id' => 2],
            ['permission_id' => 184, 'role_id' => 2],
            ['permission_id' => 185, 'role_id' => 2],
            ['permission_id' => 186, 'role_id' => 2],
            ['permission_id' => 187, 'role_id' => 2],
            ['permission_id' => 188, 'role_id' => 2],
            ['permission_id' => 189, 'role_id' => 2],
            ['permission_id' => 190, 'role_id' => 2],
            ['permission_id' => 191, 'role_id' => 2],
            ['permission_id' => 192, 'role_id' => 2],
            ['permission_id' => 193, 'role_id' => 2],
            ['permission_id' => 194, 'role_id' => 2],
            ['permission_id' => 195, 'role_id' => 2],
            ['permission_id' => 196, 'role_id' => 2],
            ['permission_id' => 197, 'role_id' => 2],
            ['permission_id' => 198, 'role_id' => 2],
            ['permission_id' => 199, 'role_id' => 2],
            ['permission_id' => 200, 'role_id' => 2],
            ['permission_id' => 201, 'role_id' => 2],
            ['permission_id' => 202, 'role_id' => 2],
            ['permission_id' => 203, 'role_id' => 2],
            ['permission_id' => 204, 'role_id' => 2],
            ['permission_id' => 205, 'role_id' => 2],
            ['permission_id' => 206, 'role_id' => 2],
            ['permission_id' => 207, 'role_id' => 2],
            ['permission_id' => 208, 'role_id' => 2],
            ['permission_id' => 209, 'role_id' => 2],
            ['permission_id' => 210, 'role_id' => 2],
            ['permission_id' => 211, 'role_id' => 2],
            ['permission_id' => 212, 'role_id' => 2],
            ['permission_id' => 213, 'role_id' => 2],
            ['permission_id' => 214, 'role_id' => 2],
            ['permission_id' => 215, 'role_id' => 2],
            ['permission_id' => 216, 'role_id' => 2],
            ['permission_id' => 217, 'role_id' => 2],
            ['permission_id' => 218, 'role_id' => 2],
            ['permission_id' => 219, 'role_id' => 2],
            ['permission_id' => 220, 'role_id' => 2],
            ['permission_id' => 221, 'role_id' => 2],
            ['permission_id' => 222, 'role_id' => 2],
            ['permission_id' => 223, 'role_id' => 2],
            ['permission_id' => 224, 'role_id' => 2],
            ['permission_id' => 225, 'role_id' => 2],
            ['permission_id' => 226, 'role_id' => 2],
            ['permission_id' => 227, 'role_id' => 2],
            ['permission_id' => 228, 'role_id' => 2],
            ['permission_id' => 229, 'role_id' => 2],
            ['permission_id' => 230, 'role_id' => 2],
            ['permission_id' => 231, 'role_id' => 2],
            ['permission_id' => 232, 'role_id' => 2],
            ['permission_id' => 233, 'role_id' => 2],
            ['permission_id' => 234, 'role_id' => 2],
            ['permission_id' => 235, 'role_id' => 2],
            ['permission_id' => 236, 'role_id' => 2],
            ['permission_id' => 237, 'role_id' => 2],
            ['permission_id' => 238, 'role_id' => 2],
            ['permission_id' => 239, 'role_id' => 2],
            ['permission_id' => 240, 'role_id' => 2],
            ['permission_id' => 241, 'role_id' => 2],
            ['permission_id' => 242, 'role_id' => 2],
            ['permission_id' => 243, 'role_id' => 2],
            ['permission_id' => 244, 'role_id' => 2],
            ['permission_id' => 245, 'role_id' => 2],
            ['permission_id' => 246, 'role_id' => 2],
            ['permission_id' => 247, 'role_id' => 2],
            ['permission_id' => 248, 'role_id' => 2],
            ['permission_id' => 249, 'role_id' => 2],
            ['permission_id' => 250, 'role_id' => 2],
            ['permission_id' => 251, 'role_id' => 2],
            ['permission_id' => 252, 'role_id' => 2],
            ['permission_id' => 253, 'role_id' => 2],
            ['permission_id' => 254, 'role_id' => 2],
            ['permission_id' => 255, 'role_id' => 2],
            ['permission_id' => 256, 'role_id' => 2],
            ['permission_id' => 257, 'role_id' => 2],
            ['permission_id' => 258, 'role_id' => 2],
            ['permission_id' => 259, 'role_id' => 2],
            ['permission_id' => 260, 'role_id' => 2],
            ['permission_id' => 261, 'role_id' => 2],
            ['permission_id' => 262, 'role_id' => 2],
            ['permission_id' => 263, 'role_id' => 2],
            ['permission_id' => 264, 'role_id' => 2],
            ['permission_id' => 265, 'role_id' => 2],
            ['permission_id' => 266, 'role_id' => 2],
            ['permission_id' => 267, 'role_id' => 2],
            ['permission_id' => 268, 'role_id' => 2],
            ['permission_id' => 269, 'role_id' => 2],
            ['permission_id' => 270, 'role_id' => 2],
            ['permission_id' => 271, 'role_id' => 2],
            ['permission_id' => 272, 'role_id' => 2],
            ['permission_id' => 273, 'role_id' => 2],
            ['permission_id' => 274, 'role_id' => 2],
            ['permission_id' => 275, 'role_id' => 2],
        ]);
    }
}
