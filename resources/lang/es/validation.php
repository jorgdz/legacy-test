<?php

use Spatie\Multitenancy\Models\Tenant;

return [

	/*
	|--------------------------------------------------------------------------
	| Validación del idioma
	|--------------------------------------------------------------------------
	|
        | Las siguientes líneas de idioma contienen los mensajes de error predeterminados utilizados por
        | La clase validadora. Algunas de estas reglas tienen múltiples versiones tales
        | como las reglas de tamaño. Siéntase libre de modificar cada uno de estos mensajes aquí.
	|
	*/


	'accepted'              => 'El campo :attribute debe ser aceptado.',
	'active_url'            => 'El campo :attribute no es una URL válida.',
	'after'                 => 'El campo :attribute debe ser una fecha después de :date.',
	'after_or_equal'        => 'El campo :attribute debe ser una fecha después o igual a :date.',
	'alpha'                 => 'El campo :attribute sólo puede contener letras.',
	'alpha_dash'            => 'El campo :attribute sólo puede contener letras, números y guiones.',
	'alpha_num'             => 'El campo :attribute sólo puede contener letras y números.',
	'array'                 => 'El campo :attribute debe ser un arreglo.',
	'before'                => 'El campo :attribute debe ser una fecha antes :date.',
	'before_or_equal'       => 'El campo :attribute debe ser una fecha antes o igual a :date.',
	'between'               => [
		'numeric' => 'El campo :attribute debe estar entre :min - :max.',
		'file'    => 'El campo :attribute debe estar entre :min - :max kilobytes.',
		'string'  => 'El campo :attribute debe estar entre :min - :max caracteres.',
		'array'   => 'El campo :attribute debe tener entre :min y :max elementos.',
	],
	'boolean'               => 'El campo :attribute debe ser verdadero o falso.',
	'confirmed'             => 'El campo de confirmación de :attribute no coincide.',
	'current_password'      => 'La contraseña es incorrecta.',
	'date'                  => 'El campo :attribute no es una fecha válida.',
	'date_equals'           => 'El campo :attribute debe ser igual a la fecha :date.',
	'date_format' 	        => 'El campo :attribute no corresponde con el formato :format.',
	'different'             => 'Los campos :attribute y :other deben ser diferentes.',
	'digits'                => 'El campo :attribute debe ser de :digits dígitos.',
	'digits_between'        => 'El campo :attribute debe tener entre :min y :max dígitos.',
	'dimensions'            => 'El campo :attribute no tiene una dimensión válida.',
	'distinct'              => 'El campo :attribute tiene un valor duplicado.',
	'email'                 => 'El formato del :attribute es inválido.',
	'ends_with'             => 'El campo :attribute debe terminar en uno de los siguientes valores: :values.',
	'exists'                => 'El campo :attribute seleccionado es inválido.',
	'file'                  => 'El campo :attribute debe ser un archivo.',
	'filled'                => 'El campo :attribute es requerido.',
	'gt'                    => [
		'numeric' => 'El campo :attribute debe ser mayor que :value.',
		'file'    => 'El campo :attribute debe ser mayor que :value kilobytes.',
		'string'  => 'El campo :attribute debe ser mayor que :value caracteres.',
		'array'   => 'El campo :attribute puede tener hasta :value elementos.',
	],
	'gte'                   => [
		'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
		'file'    => 'El campo :attribute debe ser mayor o igual que :value kilobytes.',
		'string'  => 'El campo :attribute debe ser mayor o igual que :value caracteres.',
		'array'   => 'El campo :attribute puede tener :value elementos o más.',
	],
	'image'                 => 'El campo :attribute debe ser una imagen.',
	'in'                    => 'El campo :attribute seleccionado es inválido.',
	'in_array'              => 'El campo :attribute no existe en :other.',
	'integer'               => 'El campo :attribute debe ser un entero.',
	'ip'                    => 'El campo :attribute debe ser una dirección IP válida.',
	'ipv4'                  => 'El campo :attribute debe ser una dirección IPv4 válida.',
	'ipv6'                  => 'El campo :attribute debe ser una dirección IPv6 válida.',
	'json'                  => 'El campo :attribute debe ser una cadena JSON válida.',
	'lt'                   => [
		'numeric' => 'El campo :attribute debe ser menor que :max.',
		'file'    => 'El campo :attribute debe ser menor que :max kilobytes.',
		'string'  => 'El campo :attribute debe ser menor que :max caracteres.',
		'array'   => 'El campo :attribute puede tener hasta :max elementos.',
	],
	'lte'                   => [
		'numeric' => 'El campo :attribute debe ser menor o igual que :max.',
		'file'    => 'El campo :attribute debe ser menor o igual que :max kilobytes.',
		'string'  => 'El campo :attribute debe ser menor o igual que :max caracteres.',
		'array'   => 'El campo :attribute no puede tener más que :max elementos.',
	],
	'max'                   => [
		'numeric' => 'El campo :attribute debe ser menor que :max.',
		'file'    => 'El campo :attribute debe ser menor que :max kilobytes.',
		'string'  => 'El campo :attribute debe ser menor que :max caracteres.',
		'array'   => 'El campo :attribute puede tener hasta :max elementos.',
	],
	'mimes'                 => 'El campo :attribute debe ser un archivo de tipo: :values.',
	'mimetypes'             => 'El campo :attribute debe ser un archivo de tipo: :values.',
	'min'                   => [
		'numeric' => 'El campo :attribute debe tener al menos :min.',
		'file'    => 'El campo :attribute debe tener al menos :min kilobytes.',
		'string'  => 'El campo :attribute debe tener al menos :min caracteres.',
		'array'   => 'El campo :attribute debe tener al menos :min elementos.',
	],
	'multiple_of'           => 'El campo :attribute debe ser múltiplo de :value.',
	'not_in'                => 'El campo :attribute seleccionado es invalido.',
	'not_regex'             => 'El formato del campo :attribute es inválido.',
	'numeric'               => 'El campo :attribute debe ser un número.',
	'password'              => 'La contraseña es incorrecta.',
	'present'               => 'El campo :attribute debe estar presente.',
	'regex'                 => 'El formato del campo :attribute es inválido.',
	'required'              => 'El campo :attribute es requerido.',
	'required_if'           => 'El campo :attribute es requerido cuando el campo :other es :value.',
	'required_unless'       => 'El campo :attribute es requerido a menos que :other esté presente en :values.',
	'required_with'         => 'El campo :attribute es requerido cuando :values está presente.',
	'required_with_all'     => 'El campo :attribute es requerido cuando :values está presente.',
	'required_without'      => 'El campo :attribute es requerido cuando :values no está presente.',
	'required_without_all'  => 'El campo :attribute es requerido cuando ningún :values está presente.',
	'prohibited'            => 'El campo de :attribute está prohibido.',
	'prohibited_if'         => 'El campo de :attribute esta prohibido cuando :other es :value.',
	'prohibited_unless'     => 'El campo :attribute está prohibido a menos que :other se encuentre entre los valores de :values.',
	'same'                  => 'El campo :attribute y :other debe coincidir.',
	'size'                  => [
		'numeric' => 'El campo :attribute debe ser :size.',
		'file'    => 'El campo :attribute debe tener :size kilobytes.',
		'string'  => 'El campo :attribute debe tener :size caracteres.',
		'array'   => 'El campo :attribute debe contener :size elementos.',
	],
	'starts_with'           => 'El campo :attribute debe empezar con uno de los siguientes valores :values',
	'string'                => 'El campo :attribute debe ser una cadena.',
	'timezone'              => 'El campo :attribute debe ser una zona válida.',
	'unique'                => 'El campo :attribute ya ha sido tomado.',
	'uploaded'              => 'El campo :attribute no ha podido ser cargado.',
	'url'                   => 'El formato de :attribute es inválido.',
	'uuid'                  => 'El campo :attribute debe ser un UUID valido.',

	/*
	|--------------------------------------------------------------------------
	| Validación del idioma personalizado
	|--------------------------------------------------------------------------
	|
	|	Aquí puede especificar mensajes de validación personalizados para atributos utilizando el
	| convención "attribute.rule" para nombrar las líneas. Esto hace que sea rápido
	| especifique una línea de idioma personalizada específica para una regla de atributo dada.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name'  => 'custom-message',
		],
		'emergencyContacts.*.em_ct_name' => [
			'required' => 'El campo nombre de contacto emergencia es requerido',
			'string'   => 'El campo nombre de contacto emergencia debe ser una cadena.'
		],
		'emergencyContacts.*.em_ct_first_phone' => [
			'required' => 'El campo número teléfono principal es requerido',
			'string'   => 'El campo número teléfono principal debe ser una cadena.'
		],
		'emergencyContacts.*.status_id' => [
			'required' => 'El campo estado es requerido',
			'integer'  => 'El campo estado debe ser un entero.',
			'exists'   => 'El campo estado seleccionado es inválido.'
		],
		'emergencyContacts.*.type_kinship_id' => [
			'required' => 'El campo parentesco es requerido',
			'integer'  => 'El campo parentesco debe ser un entero.',
			'exists'   => 'El campo parentesco seleccionado es inválido.'
		],
		'emergencyContacts.*.person_id' => [
			'required' => 'El campo nombre de contacto emergencia es requerido',
			'integer'   => 'El campo nombre de contacto emergencia debe ser un entero.',
			'exists'   => 'El campo persona es inválido.'
		],
		'jobs.*.per_job_organization' => [
			'string'   => 'El campo organizacion debe ser una cadena.'
		],
		'jobs.*.per_job_position' => [
			'string'   => 'El campo posicion debe ser una cadena.'
		],
		'jobs.*.per_job_direction' => [
			'string'   => 'El campo direccion debe ser una cadena.'
		],
		'jobs.*.per_job_phone' => [
			'string'   => 'El campo telefono debe ser una cadena.',
			'max'      => [
				'string'  => 'El campo telefono debe ser menor que 20 caracteres.',
			]
		],
		'jobs.*.per_job_start_date' => [
			'date'   => 'El campo fecha de inicio no es una fecha válida.'
		],
		'jobs.*.per_job_end_date' => [
			'date'   => 'El campo fecha de fin no es una fecha válida.'
		],
		'jobs.*.per_job_current' => [
			'boolean'   => 'El campo actual debe ser verdadero o falso.'
		],
		'jobs.*.city_id' => [
			'required' => 'El campo ciudad es requerido',
			'integer'  => 'El campo ciudad debe ser un entero.',
			'exists'   => 'El campo ciudad seleccionado es inválido.'
		],
		'jobs.*.status_id' => [
			'required' => 'El campo estado es requerido',
			'integer'  => 'El campo estado debe ser un entero.',
			'exists'   => 'El campo estado seleccionado es inválido.'
		],
		'hourhands.*' => [
			'exists' => 'El valor del campo horario seleccionado es inválido.',
			'integer' => 'El valor del campo horario debe ser un entero.',
			'distinct' => 'El valor del campo horario tiene un valor duplicado.'
		],
		'offers.*' => [
			'exists' => 'El valor del campo oferta seleccionado es inválido.',
			'integer' => 'El valor del campo oferta debe ser un entero.',
			'distinct' => 'El valor del campo oferta tiene un valor duplicado.'
		],
		'languages.*' => [
			'exists' => 'El valor del campo lenguaje seleccionado es inválido.',
			'integer' => 'El valor del campo lenguaje debe ser un entero.',
			'distinct' => 'El valor del campo lenguaje tiene un valor duplicado.'
		],
		'matterMesh.*' => [
			'exists' => 'El valor del campo materia malla seleccionado es inválido.',
			'integer' => 'El valor del campo materia malla debe ser un entero.',
			'distinct' => 'El valor del campo materia malla tiene un valor duplicado.'
		],
		'campus.*' => [
			'exists' => 'El valor del campo sede seleccionado es inválido.',
			'integer' => 'El valor del campo sede debe ser un entero.',
		],
		'simbologies.*' => [
			'exists' => 'El valor del campo simbologia seleccionado es inválido.',
			'integer' => 'El valor del campo simbologia debe ser un entero.',
			'distinct' => 'El valor del campo simbologia tiene un valor duplicado.'
		],
		'classrooms.*' => [
			'exists' => 'El valor del campo aula seleccionado es inválido.',
			'integer' => 'El valor del campo aula debe ser un entero.',
			'distinct' => 'El valor del campo aula tiene un valor duplicado.'
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Atributos de validación personalizados
	|--------------------------------------------------------------------------
	|
        | Las siguientes líneas de idioma se utilizan para intercambiar los marcadores de posición de atributo.
        | con algo más fácil de leer, como la dirección de correo electrónico.
        | de "email". Esto simplemente nos ayuda a hacer los mensajes un poco más limpios.
	|
	*/


	'attributes' => [
		'hourhand' => 'horario',
		'offer' => 'oferta',
		'blo_typ_name' => 'nombre del tipo de sangre',
		'blo_typ_description' => 'descripción del tipo de sangre',
		'status_id' => 'estado',
		'cam_name' => 'nombre de sede',
		'cam_description' => 'descripción de sede',
		'cam_direction' => 'dirección de la sede',
		'cam_initials' => 'sigla de sede',
		'company_id' => 'compañia',
		'cit_name' => 'nombre de ciudad',
		'cit_acronym' => 'sigla de ciudad',
		'cit_parent_city' => 'ciudad padre',
		'cl_name' => 'nombre de aula',
		'cl_description' => 'descripción del aula',
		'cl_acronym' => 'sigla del aula',
		'co_name' => 'nombre de la compañia',
		'co_description' => 'descripción de la compañia',
		'co_website' => 'sitio web de la compañia',
		'co_facebook' => 'cuenta de facebook',
		'co_instagram' => 'cuenta de instagram',
		'co_linkedin' => 'cuenta de linkedin',
		'co_youtube' => 'cuenta de youtube',
		'co_info_mail' => 'correo informativo',
		'co_assigned_site' => 'sitio asignado',
		'co_matrix' => 'matriz',
		'co_logo' => 'logo',
		'co_color' => 'color',
		'co_pay_notification' => 'notificación de pago',
		'co_ruc' => 'ruc',
		'co_business_name' => 'nombre del negocio',
		'co_comercial_name' => 'nombre comercial',
		'co_legal_identification' => 'identificación legal',
		'co_agent_legal' => 'agente legal',
		'co_person_type' => 'tipo de persona',
		'co_direction' => 'dirección',
		'co_phone' => 'teléfono de  la compañía',
		'co_email' => 'correo de la compañía',
		'eco_gro_name' => 'nombre del grupo económico',
		'eco_gro_description' => 'descripción del grupo económico',
		'edu_name' => 'nombre del nivel educativo',
		'edu_alias' => 'alias del nivel educativo',
		'edu_order' => 'orden del nivel educativo',
		'offer_id' => 'oferta',
		'principal_id' => 'agrupación',
		'eth_name' => 'nombre de etnia',
		'eth_description' => 'descripción de etnia',
		'inst_name' => 'nombre de la institución',
		'city_id' => 'ciudad',
		'type_institute_id' => 'instituto',

		/**
		 * tenant
		 */
		'logo_name' => 'Nombre del logo',
		'logo_path' => 'Ruta del logo',

		/**
		 * TenantModule
		 */
		'tenant_id' => 'Inquilino',
		'module_id' => 'Modulo',

		/**
		 * type_institutes
		 */
		'tin_name' => 'nombre del tipo instituto',

		/**
		 * mails
		 */
		'transport' => 'agregar la configuración de cumplimiento de transporte seguro',
		'host' => 'anfitrión',
		'port' => 'puerto',
		'encryption' => 'encriptación',
		'username' => 'nombre de usuario',

		/**
		 * matters
		 */
		'mat_name' => 'nombre de materia',
		'cod_matter_migration' => 'codigo de materia migrado',
		'cod_old_migration' => 'codigo de migración de materia antigua',
		'mat_acronym' => 'acrónimo de materia',
		'mat_translate' => 'traducción de la materia',
		'mat_description' => 'descripción de materia',
		'type_matter_id' => 'tipo de materia',
		'education_level_id' => 'nivel educativo',
		'area_id' => 'área',

		/**
		 * matter_mesh
		 */
		'matter_id' => 'malla de materia',
		'mesh_id' => 'malla',
		'simbology_id' => 'simbologia',
		'can_homologate' => 'homologación',
		'min_note' => 'mínima nota',
		'min_calification' => 'calificación minima',
		'max_calification' => 'calificación maxima',
		'num_fouls' => 'numero de faltas',
		'matter_rename' => 'cambiar el nombre de la materia',
		'group' => 'grupo',
		'calification_models_id' => 'modelo de calificación',
		'matterMesh' => 'las opciones de los materias y mallas',

		/**
		 * matter_status
		 */
		'type' => 'tipo',

		/**
		 * meshs
		 */
		'mes_name' => 'nombre de malla',
		'mes_res_cas' => 'resolución CAS',
		'mes_res_ocas' => 'resolución OCAS',
		'mes_cod_career' => 'código de carrera',
		'mes_title' => 'título de la malla',
		'mes_itinerary' => 'itinerario de la malla',
		'mes_number_matter' => 'número de materias',
		'mes_number_period' => 'numero de periodos',
		'mes_quantity_external_matter_homologate' => 'cantidad de materias externas a homologar',
		'mes_quantity_internal_matter_homologate' => 'cantidad de materias internas a homologar',
		'mes_creation_date' => 'fecha de creación de la malla',
		'mes_acronym' => 'acrónimo de malla',
		'anio' => 'año',
		'mes_description' => 'descriptición de malla',
		'mes_modality_id' => 'modalidad',
		'type_calification_id' => 'tipo de calificación',
		'level_edu_id' => 'nivel educativo',

		/**
		 * offers
		 */
		'off_name' => 'nombre de oferta',
		'off_description' => 'descripcion de oferta',
		'simbologies' => 'simbologias',

		/**
		 * offer_period
		 */
		'period_id' => 'periodo',

		/**
		 * parallels
		 */
		'par_name' => 'nombre del paralelo',
		'par_description' => 'descripción del paralelo',
		'par_acronym' => 'acrónimo de paralelo',

		/**
		 * pensums
		 */
		'pen_name' => 'nombre del pensums',
		'pen_description' => 'descripción de pensums',
		'pen_acronym' => 'acrónimo de pensums',
		'anio' => 'año',

		/**
		 * periods
		 */
		'per_name' => 'nombre del período',
		'per_reference' => 'períodos de referencia',
		'per_current_year' => 'períodos del año en curso',
		'per_due_year' => 'períodos de vencimiento anual',
		'per_min_matter_enrollment' => 'minimo de materia de matrícula por período',
		'per_max_matter_enrollment' => 'maximo de materia de matrícula por período',
		'per_num_fees' => 'número de cuotas',
		'per_fees_enrollment' => 'cuota de inscripción',
		'per_pay_enrollment' => 'cobro de matrícula',
		'campus' => 'sedes',
		'type_period_id' => 'tipo de periodo',
		'offers' => 'las opciones de ofertas',
		'hourhands' => 'las opciones de los horarios',

		/**
		 * hourhands
		 */
		'hour_monday' => 'horario del lunes',
		'hour_tuesday' => 'horario del martes',
		'hour_wednesday' => 'horario del miércoles',
		'hour_thursday' => 'horario del jueves',
		'hour_friday' => 'horario del viernes',
		'hour_saturday' => 'horario del sábado',
		'hour_sunday' => 'horario del domingo',
		'hour_start_time_monday' => 'hora de inicio del lunes',
		'hour_end_time_monday' => 'hora final del lunes',
		'hour_start_time_tuesday' => 'hora de inicio del martes',
		'hour_end_time_tuesday' => 'hora final del martes',
		'hour_start_time_wednesday' => 'hora de inicio del miércoles',
		'hour_end_time_wednesday' => 'hora final del miércoles',
		'hour_start_time_thursday' => 'hora de inicio del jueves',
		'hour_end_time_thursday' => 'hora final del jueves',
		'hour_start_time_friday' => 'hora de inicio del viernes',
		'hour_end_time_friday' => 'hora final del viernes',
		'hour_start_time_saturday' => 'hora de inicio del sábado',
		'hour_end_time_saturday' => 'hora final del sábado',
		'hour_start_time_sunday' => 'hora de inicio del domingo',
		'hour_end_time_sunday' => 'hora final del domingo',
		'hour_description' => 'descripción del horario',

		/**
		 * period_stages
		 */
		'stage_id' => 'etapa',
		'start_date' => 'fecha de inicio',
		'end_date' => 'fecha de fin',

		/**
		 * permissions
		 */
		'alias' => 'alias',
		'guard_name' => 'nombre guardado',
		'parent_name' => 'nombre perfil padre',

		/**
		 * persons
		 */
		'pers_identification' => 'número de identificación de la persona',
		'pers_firstname' => 'primer nombre de la persona',
		'pers_secondname' => 'segundo nombre de la persona',
		'pers_first_lastname' => 'primer apellido de la persona',
		'pers_second_lastname' => 'segundo apellido de la persona',
		'pers_gender' => 'género de la persona',
		'pers_date_birth' => 'fecha de nacimiento de la persona',
		'pers_direction' => 'dirección de la persona',
		'pers_phone_home' => 'número télefónico de la persona',
		'pers_cell' => 'número celular de la persona',
		'pers_num_child' => 'número de hijos de la persona',
		'pers_profession' => 'profesión de la persona',
		'pers_num_bedrooms' => 'número de dormitorios',
		'pers_study_reason' => 'motivo de estudio',
		'pers_num_taxpayers_household' => 'número de contribuyentes en el hogar',
		'pers_has_vehicle' => 'Tiene vehiculo propio',
		'pers_nationality' => 'nacionalidad',
		'pers_has_disability' => 'tiene capacidad especial',
		'pers_disability_identification' => 'número de identificación del registro de capacidad especial',
		'pers_disability_percent' => 'porcentaje de capacidad especial',
		'pers_disabilities' => 'lista de capacidades especiales',
		'city_id' => 'ciudad natal',
		'vivienda_id' => 'vivienda',
		'type_identification_id' => 'tipo de identificación de la persona',
		'type_religion_id' => 'tipo de religión',
		'status_marital_id' => 'estado civil',
		'city_id' => 'ciudad natal',
		'current_city_id' => 'ciudad actual',
		'sector_id' => 'sector',
		'ethnic_id' => 'étnica',
		'user_id' => 'usuario',
		'languages' => 'lenguajes',
		'pers_has_disability' => 'discapacidad',
		'pers_disability_identification' => 'número de identificación de discapacidad',
		'pers_disability_percent' => 'porcentaje de discapacidad',
		/**
		 * Relatives
		 */
		'type_identification_id_relatives_person' => 'tipo de identificación del familiar',
		'pers_identification_relatives_person' => 'número de identificación del familiar',
		'pers_firstname_relatives_person' => 'primer nombre de la persona',
		'pers_secondname_relatives_person' => 'segundo nombre de la person',
		'pers_first_lastname_relatives_person' => 'primer apellido de la persona',
		'pers_second_lastname_relatives_person' => 'segundo apellido de la persona',
		'pers_relatives_person_desc' => 'descripción de la relación con el familiar',

		/**
		 * Collaborators
		 */
		'coll_email' => 'correo empresarial del colaborador',
		'coll_type' => 'tipo de colaborador',
		'coll_journey_description' => 'jornada laboral',
		'coll_dependency' => 'relación de dependencia',
		'coll_journey_hours' => 'horas en la jornada laboral',
		'position_company_id' => 'posición del colaborador',
		'coll_entering_date' => 'fecha de ingreso del colaborador',
		'coll_leaving_date' => 'fecha de salida del colaborador',
		'coll_membership_num' => 'número de afilicación',
		'coll_contract_num' => 'número de contrato',
		'coll_has_nomination' => 'tiene nombremiento',
		'coll_nomination_entering_date' => 'fecha de ingreso del nombramiento',
		'coll_nomination_leaving_date' => 'fecha de fin del nombremiento',
		
		/**
		 * PersonalAccessToken
		 */

		/**
		 * profiles
		 */
		'pro_name' => 'nombre del perfil',

		/**
		 * roles
		 */

		/**
		 * sectors
		 */
		'sec_name' => 'nombre del sector',
		'sec_description' => 'descripción del sector',
		'sec_acronym' => 'acrónimo sectorial',

		/**
		 * stages
		 */
		'stg_name' => 'nombre de etapa',
		'stg_description' => 'descripción de etapa',
		'stg_acronym' => 'acrónimo de etapa',

		/**
		 * status
		 */
		'st_name' => 'nombre del estado',

		/**
		 * status_marital
		 */
		'sta_mar_name' => 'nombre de estado civil',
		'sta_mar_description' => 'descripción estado civil',

		/**
		 * type_califications
		 */
		'tc_name' => 'nombre de tipo calcificaciones',
		'tc_description' => 'descripción de tipo calcificaciones',

		/**
		 * type_daytrip
		 */
		'typ_day_name' => 'nombre de jornada academica',
		'typ_day_description' => 'descripción de jornada academica',

		/**
		 * type_disabilities
		 */
		'typ_dis_name' => 'nombre del tipo discapacidad',
		'typ_dis_description' => 'descripción del tipo discapacidad',

		/**
		 * type_document
		 */
		'typ_doc_name' => 'nombre del tipo documento',
		'typ_doc_description' => 'descripción del tipo documento',

		/**
		 * type_education
		 */
		'typ_edu_name' => 'nombre del tipo educación',
		'typ_edu_description' => 'descripción del tipo de educación',

		/**
		 * type_identifications
		 */
		'ti_name' => 'nombre del tipo indentificaion',

		/**
		 * type_kinship
		 */
		'typ_kin_name' => 'nombre del tipo parentesco',
		'typ_kin_description' => 'descripción del tipo parentesco',

		/**
		 * type_languages
		 */
		'typ_lan_name' => 'nombre del tipo idioma ',
		'typ_lan_description' => 'descripción del tipo idioma',

		/**
		 * type_matters
		 */
		'tm_name' => 'nombre del tipo materia',
		'tm_acronym' => 'acrónimo del tipo materia',
		'tm_description' => 'descripción del tipo materia',
		'tm_order' => 'orden del tipo materia',
		'tm_cobro' => 'cobro del tipo materia',
		'tm_matter_count' => 'recuento de materia del tipo materia',

		/**
		 * type_periods
		 */
		'tp_name' => 'nombre del tipo período',
		'tp_description' => 'descripción del tipo período',
		'tp_min_matter_enrollment' => 'inscripción minima del tipo período',
		'tp_max_matter_enrollment' => 'inscripción maxima del tipo período',

		/**
		 * type_religions
		 */
		'typ_rel_name' => 'nombre del tipo religión',
		'typ_rel_description' => 'descripción del tipo religión',

		/*
		* type_students
		*/
		'te_name' => 'nombre del tipo estudiante',
		'te_description' => 'descripción del tipo estudiante',

		/*
		* user_profiles
		*/
		'profile_id' => 'perfil usuario',

		/*
		* Emergency Contact
		*/
		'em_ct_name' 		=> 'nombre de contacto emergencia',
		'em_ct_first_phone' => 'número teléfono principal',
		'type_kinship_id'	=> 'Parentesco',
		'person_id'			=> 'Persona',

		/*
		* Tags Student
		*/
		'tg_name' 		=> 'nombre de etiqueta del estudiente',

		/**
		 * student_records
		 */
		'student_id' => 'estudiante',
		'education_level_id' => 'nivel educativo',
		'pensum_id' => 'pensum',
		'type_student_id' => 'tipo de estudiante',
		'economic_group_id' => 'grupo economico',

		/**
		 * criteria_student_records
		 */
		'qualification' => 'calificación',
		'type_criteria_id' => 'tipo de criterio',
		'student_record_id' => 'récord estudiantil',

		/**
		 * person_jobs
		 */
		'per_job_organization' => 'nombre de la organizacion',
		'per_job_position' => 'posicion que ocupa en el trabajo',
		'per_job_direction' => 'direccion del trabajo',
		'per_job_phone' => 'numero telefonico',
		'per_job_start_date' => 'fecha de inicio',
		'per_job_end_date' => 'fecha de fin',
		'per_job_current' => 'trabaja actualmente aqui',
		'per_job_iess_affiliated' => 'esta afiliado al iess',
		'city_id' => 'ciudad',
		'person_id' => 'persona',

		/**
		 * student_documents
		 */
		'stu_doc_url' => 'url del documento',
		'stu_doc_name_file' => 'nombre del archivo',
		'type_document_id' => 'tipo documento',

		'title' => 'titulo',
		'name' => 'nombre',
		'description' => 'descripcion',
		'price' => 'precio',
		'author_id' => 'autor',
		'category_id' => 'categoria',
		'domain' => 'dominio',
		'domain_client' => 'dominio del cliente',
		'database' => 'base de datos',
		'us_username' => 'nombre de usuario',
		'password' => 'contraseña',
		'email' => 'correo',
		'remember_token' => 'recordar token',
		'person_id' => 'persona',

		/**
		 * Catalogs
		 */
		'cat_name' => 'nombre del catalogo',
		'cat_description' => 'descripcion del catalogo',
		'cat_acronym' => 'acrónimo del catalogo',
		'parent_id' => 'padre',

		/**
		 * Type Student Programs
		 */
		'typ_stu_pro_name' => 'nombre del tipo programa para estudiantes',
		'typ_stu_pro_description' => 'descripción del tipo programa para estudiantes',
		'typ_stu_pro_acronym' => 'Acrónimo programa para estudiantes',

		/**
		 * Component
		 */
		'com_acronym' => 'abreviatura del componente de aprendizaje',
		'com_name' 	  => 'nombre del componente de aprendizaje',
		'component_id' => 'componente',

		/**
		 * Details MatterMesh
		 */
		'matter_mesh_id' => 'materia malla',
		'components_id'  => 'componente aprendizaje',
		'dem_workload'   => 'carga horaria',

		/**
		 * Simbologies
		 */
		'sim_color' => 'color de la simbologia',
		'sim_description' => 'nombre de la simbologia',

		/**
		 * Student Record Programs
		 */
		'type_student_program_id' => 'tipo programa para estudiantes',

		/**
		 * Classroom Type
		 */
		'clt_name' => 'nombre del tipo de aula',
		'clt_description' => 'descripcion del tipo de aula',

		/**
		 * Positions
		 */
		'pos_name' => 'nombre del cargo',
		'pos_description' => 'descripcion del cargo',

		/**
		 * Calification Models
		 */
		'cal_mod_name' => 'nombre del modelo de calificación',
		'cal_mod_acronym' => 'sigla del modelo de calificación',
		'cal_mod_equivalence' => 'equivalencia del modelo de calificación',
		'calification_models_id' => 'modelo de calificación',

		/**
		 * Agreements (Convenios)
		 */
		'agr_name' => 'nombre del convenio',
		'agr_num_matter_homologate' => 'cantidad de materias a homologar',
		/**
		 * Deparments
		 */
		'department_id'=>'departamento',
		'dep_name' => 'nombre del departamento',
		'dep_description' => 'descripcion del departamento',

		/**
		 * Collaborator Hour
		 */
		'ch_working_time' => 'tiempo dedicacion',

		/**
		 * Hours summaries
		 */
		'collaborator_id' => 'colaborador',
		'hs_classes' => 'horas de clases',
		'hs_classes_examns_preparation' => 'horas de preparacion de clases y examenes',
		'hs_tutoring' => 'horas de tutorias',
		'hs_bonding' => 'horas de vinculacion',
		'hs_academic_management' => 'horas de gestion academica',
		'hs_research' => 'horas de investigacion',
		'hs_total' => 'total',
		'collaborator_hour_id'=>'horas de colaborador'
		
		
		
		
		
		
		
		
		
		
		
	],

];
