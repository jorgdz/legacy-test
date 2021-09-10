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
            ['name' => 'Colaborador', 'description' => 'Usuario administrador', 'guard_name' => 'api', 'status_id' => 1],
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
             * Oferta periodo 107-114
             */
            [
                'name' => 'offerPeriod-listar-periodos-por-oferta',
                'alias' => 'Listar periodos por oferta',
                'description' => 'Listar todos los periodos por oferta',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerperiod'
            ],
            [
                'name' => 'PeriodOffer-listar-ofertas-por-periodo',
                'alias' => 'Listar oferta por periodo',
                'description' => 'Listar todas las ofertas por periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerperiod'
            ],
            [
                'name' => 'offerPeriod-obtener-periodo-por-oferta',
                'alias' => 'Obtener un registro relacionado offer_period',
                'description' => 'Obtener ofertas relacionadas con el identificador de un periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerperiod'
            ],
            [
                'name' => 'offerPeriod-crear-periodo-por-oferta',
                'alias' => 'Crear un registro relacionado offer_period',
                'description' => 'Agregar un registro relacional entre oferta y periodo',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerperiod'
            ],
            [
                'name' => 'offerPeriod-actualizar-periodo-por-oferta',
                'alias' => 'Actualizar un registro relacionado offer_period',
                'description' => 'Actualizar un registro relacional entre oferta y periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerperiod'
            ],
            [
                'name' => 'offerPeriod-borrar-periodo-por-oferta',
                'alias' => 'Borrar un registro relacionado de offer_period',
                'description' => 'Borrar un registro de oferta especifico relacionado con periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerperiod'
            ],
            [
                'name' => 'offerPeriod-borrar-periodos-por-oferta',
                'alias' => 'Borrar un registro relacionado offer_period',
                'description' => 'Borrar los registro relacionados entre oferta y periodo por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerperiod'
            ],
            [
                'name' => 'PeriodOffer-borrar-ofertas-por-periodo',
                'alias' => 'Borrar un registro relacionado entre offer_period',
                'description' => 'Borrar los registro relacionados entre periodo y oferta por su identificador',
                'guard_name' => 'api',
                'status_id' => 1,
                'parent_name' => 'offerperiod'
            ],
            /**
             * Horarios 115-119
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
             * Institutos 120-124
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
             * Tipo Institutos 125-129
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
             * Mail 130-132
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
             * Estado Materia 133-137
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
             * Usuario 138-140
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
             * Niveles Educativos 141-145
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
             * Tipo Estudiante 146-147
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
             * Tipo Documento 148-152
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
             * Oferta periodo
             */
            ['permission_id' => 107, 'role_id' => 1],
            ['permission_id' => 108, 'role_id' => 1],
            ['permission_id' => 109, 'role_id' => 1],
            ['permission_id' => 110, 'role_id' => 1],
            ['permission_id' => 111, 'role_id' => 1],
            ['permission_id' => 112, 'role_id' => 1],
            ['permission_id' => 113, 'role_id' => 1],
            ['permission_id' => 114, 'role_id' => 1],
            /**
             * Horarios
             */
            ['permission_id' => 115, 'role_id' => 1],
            ['permission_id' => 116, 'role_id' => 1],
            ['permission_id' => 117, 'role_id' => 1],
            ['permission_id' => 118, 'role_id' => 1],
            ['permission_id' => 119, 'role_id' => 1],
            /**
             * Institutos
             */
            ['permission_id' => 120, 'role_id' => 1],
            ['permission_id' => 121, 'role_id' => 1],
            ['permission_id' => 122, 'role_id' => 1],
            ['permission_id' => 123, 'role_id' => 1],
            ['permission_id' => 124, 'role_id' => 1],
            /**
             * Tipo Institutos
             */
            ['permission_id' => 125, 'role_id' => 1],
            ['permission_id' => 126, 'role_id' => 1],
            ['permission_id' => 127, 'role_id' => 1],
            ['permission_id' => 128, 'role_id' => 1],
            ['permission_id' => 129, 'role_id' => 1],
            /**
             * Mail
             */
            ['permission_id' => 130, 'role_id' => 1],
            ['permission_id' => 131, 'role_id' => 1],
            ['permission_id' => 132, 'role_id' => 1],
            /**
             * Estado materia
             */
            ['permission_id' => 133, 'role_id' => 1],
            ['permission_id' => 134, 'role_id' => 1],
            ['permission_id' => 135, 'role_id' => 1],
            ['permission_id' => 136, 'role_id' => 1],
            ['permission_id' => 137, 'role_id' => 1],
            /**
             * Usuario
             */
            ['permission_id' => 138, 'role_id' => 1],
            ['permission_id' => 139, 'role_id' => 1],
            ['permission_id' => 140, 'role_id' => 1],
            /**
             * Niveles Educativos
             */
            ['permission_id' => 141, 'role_id' => 1],
            ['permission_id' => 142, 'role_id' => 1],
            ['permission_id' => 143, 'role_id' => 1],
            ['permission_id' => 144, 'role_id' => 1],
            ['permission_id' => 145, 'role_id' => 1],
            /**
             * Tipo Estudiante
             */
            ['permission_id' => 146, 'role_id' => 1],
            ['permission_id' => 147, 'role_id' => 1],
            /**
             * Tipo Documento
             */
            ['permission_id' => 148, 'role_id' => 1],
            ['permission_id' => 149, 'role_id' => 1],
            ['permission_id' => 150, 'role_id' => 1],
            ['permission_id' => 151, 'role_id' => 1],
            ['permission_id' => 152, 'role_id' => 1],

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
             * Oferta periodo
             */
            ['permission_id' => 107, 'role_id' => 2],
            ['permission_id' => 108, 'role_id' => 2],
            ['permission_id' => 109, 'role_id' => 2],
            ['permission_id' => 110, 'role_id' => 2],
            ['permission_id' => 111, 'role_id' => 2],
            ['permission_id' => 112, 'role_id' => 2],
            ['permission_id' => 113, 'role_id' => 2],
            ['permission_id' => 114, 'role_id' => 2],
            /**
             * Horarios
             */
            ['permission_id' => 115, 'role_id' => 2],
            ['permission_id' => 116, 'role_id' => 2],
            ['permission_id' => 117, 'role_id' => 2],
            ['permission_id' => 118, 'role_id' => 2],
            ['permission_id' => 119, 'role_id' => 2],
            /**
             * Institutos
             */
            ['permission_id' => 120, 'role_id' => 2],
            ['permission_id' => 121, 'role_id' => 2],
            ['permission_id' => 122, 'role_id' => 2],
            ['permission_id' => 123, 'role_id' => 2],
            ['permission_id' => 124, 'role_id' => 2],
            /**
             * Tipo Institutos
             */
            ['permission_id' => 125, 'role_id' => 2],
            ['permission_id' => 126, 'role_id' => 2],
            ['permission_id' => 127, 'role_id' => 2],
            ['permission_id' => 128, 'role_id' => 2],
            ['permission_id' => 129, 'role_id' => 2],
            /**
             * Mail
             */
            ['permission_id' => 130, 'role_id' => 2],
            ['permission_id' => 131, 'role_id' => 2],
            ['permission_id' => 132, 'role_id' => 2],
            /**
             * Estado materia
             */
            ['permission_id' => 133, 'role_id' => 2],
            ['permission_id' => 134, 'role_id' => 2],
            ['permission_id' => 135, 'role_id' => 2],
            ['permission_id' => 136, 'role_id' => 2],
            ['permission_id' => 137, 'role_id' => 2],
            /**
             * Usuario
             */
            ['permission_id' => 138, 'role_id' => 2],
            ['permission_id' => 139, 'role_id' => 2],
            ['permission_id' => 140, 'role_id' => 2],
            /**
             * Niveles Educativos
             */
            ['permission_id' => 141, 'role_id' => 2],
            ['permission_id' => 142, 'role_id' => 2],
            ['permission_id' => 143, 'role_id' => 2],
            ['permission_id' => 144, 'role_id' => 2],
            ['permission_id' => 145, 'role_id' => 2],
            /**
             * Tipo Estudiante
             */
            ['permission_id' => 146, 'role_id' => 2],
            ['permission_id' => 147, 'role_id' => 2],
            /**
             * Tipo Documento
             */
            ['permission_id' => 148, 'role_id' => 2],
            ['permission_id' => 149, 'role_id' => 2],
            ['permission_id' => 150, 'role_id' => 2],
            ['permission_id' => 151, 'role_id' => 2],
            ['permission_id' => 152, 'role_id' => 2],
        ]);
    }
}
