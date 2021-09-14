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
		'emergencyContacts.*.em_ct_name'=> [
			'required' => 'El campo nombre de contacto emergencia es requerido',
			'string'   => 'El campo nombre de contacto emergencia debe ser una cadena.'
		],
		'emergencyContacts.*.em_ct_first_phone'=> [
			'required' => 'El campo nombre de contacto emergencia es requerido',
			'string'   => 'El campo nombre de contacto emergencia debe ser una cadena.'
		],
		'emergencyContacts.*.status_id'=> [
			'required' => 'El campo nombre de contacto emergencia es requerido',
			'integer'  => 'El campo nombre de contacto emergencia debe ser un entero.',
			'exists'   => 'El campo estado seleccionado es inválido.'
		],
		'emergencyContacts.*.type_kinship_id'=> [
			'required' => 'El campo nombre de contacto emergencia es requerido',
			'integer'   => 'El campo nombre de contacto emergencia debe ser un entero.',
			'exists'   => 'El campo parentesco seleccionado es inválido.'
		],
		'emergencyContacts.*.person_id'=> [
			'required' => 'El campo nombre de contacto emergencia es requerido',
			'integer'   => 'El campo nombre de contacto emergencia debe ser un entero.',
			'exists'   => 'El campo persona es inválido.'
		],
		'jobs.*.per_job_organization'=> [
			'string'   => 'El campo organizacion debe ser una cadena.'
		],
		'jobs.*.per_job_position'=> [
			'string'   => 'El campo posicion debe ser una cadena.'
		],
		'jobs.*.per_job_direction'=> [
			'string'   => 'El campo direccion debe ser una cadena.'
		],
		'jobs.*.per_job_phone'=> [
			'string'   => 'El campo telefono debe ser una cadena.',
			'max'      => [
				'string'  => 'El campo telefono debe ser menor que 20 caracteres.',
			]				
		],
		'jobs.*.per_job_start_date'=> [
			'date'   => 'El campo fecha de inicio no es una fecha válida.'
		],
		'jobs.*.per_job_end_date'=> [
			'date'   => 'El campo fecha de fin no es una fecha válida.'
		],
		'jobs.*.per_job_current'=> [
			'boolean'   => 'El campo actual debe ser verdadero o falso.'
		],
		'jobs.*.city_id'=> [
			'required' => 'El campo ciudad es requerido',
			'integer'  => 'El campo ciudad debe ser un entero.',
			'exists'   => 'El campo ciudad seleccionado es inválido.'
		],
		'jobs.*.status_id'=> [
			'required' => 'El campo estado es requerido',
			'integer'  => 'El campo estado debe ser un entero.',
			'exists'   => 'El campo estado seleccionado es inválido.'
		],
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
		'edu_alias' => 'alias del nivel educativo',
		'edu_order' => 'orden del nivel educativo',
		'edu_order' => 'orden del nivel educativo',
		'offer_id' => 'oferta',
		'principal_id' => 'agrupación',
		'eth_name' => 'nombre de etnia',
		'eth_description' => 'descripción de etnia',
		'inst_name' => 'nombre de la institución',
		'city_id' => 'ciudad',
		'type_institute_id' => 'instituto',

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

		//tenant_id
		/**
		 * matters
		 */
		'mat_name' => 'nombre de materia',
		'mat_description' => 'descripción de materia',
		'mat_acronym' => 'acrónimo de materia',
		'cod_matter_migration' => 'codigo de materia migrado',
		'cod_old_migration' => 'codigo de migración de materia antigua',
		'type_matter_id' => 'tipo de materia',
		'type_calification_id' => 'tipo de calificación',
		'min_note' => 'nota minima',
		/**
		 * matter_mesh
		 */
		'matter_id' => 'malla de materia',
		'mesh_id' => 'malla',
		'calification_type' => 'tipo de calificación',
		'min_calification' => 'calificación minima',
		'num_fouls' => 'numero de faltas',
		'matter_rename' => 'cambiar el nombre de la materia',
		/**
		 * matter_status
		 */
		'type' => 'tipo',
		/**
		 * meshs
		 */
		'mes_name' => 'nombre de malla',
		'mes_description' => 'descriptición de malla',
		'mes_acronym' => 'acrónimo de malla',
		'pensum_id' => 'pensum',
		'level_edu_id' => 'nivel educativo',
		/**
		 * offers
		 */
		'off_name' => 'nombre de oferta',
		'off_description' => 'descripcion de oferta',
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
		'campus_id' => 'campus',
		'type_period_id' => 'tipo de periodo',
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
		'pers_identification' => 'identificación de persona',
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
		'type_identification_id' => '',
		'user_id' => 'usuario',
		'type_religion_id' => 'tipo de religión',
		'status_marital_id' => 'estado civil',
		'current_city_id' => 'ciudad actual',
		'sector_id' => 'sector',
		'ethnic_id' => 'étnica',
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
        /**
         * student_records
         */
        'student_id' => 'estudiante',
        'education_level_id' => 'nivel educativo',
        'pensum_id' => 'pensum',
        'type_student_id' => 'tipo de estudiante',
        'period_id' => 'periodo',
        'economic_group_id' => 'grupo economico',
        /**
         * criteria_student_records
         */
        'qualification' => 'calificación',
        'type_criteria_id' => 'tipo de criterio',
        'student_record_id' => 'récord estudiantil',

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
		'person_id' => 'persona'
	],

];
