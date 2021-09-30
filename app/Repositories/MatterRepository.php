<?php

namespace App\Repositories;

use App\Models\Matter;
use App\Repositories\Base\BaseRepository;

class MatterRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'typeMatter', 'educationLevel', 'matterMesh', 'area'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['type_matters', 'education_levels', 'areas', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'mat_name',
        'cod_matter_migration',
        'cod_old_migration',
        'mat_acronym',
        'mat_translate'
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'mat_name', 'mat_acronym', 'cod_matter_migration', 'cod_old_migration',
        'tm_name', 'tm_acronym', 'edu_name', 'edu_alias', 'edu_order', 'ar_name', 'st_name'
    ];


    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Matter $matter) {
        parent::__construct($matter);
    }
}
