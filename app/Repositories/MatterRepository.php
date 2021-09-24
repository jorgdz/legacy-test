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
    protected $relations = ['status', 'typeMatter', 'typeCalification', 'educationLevel','matterMesh'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['type_matters', 'type_califications', 'education_levels','status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'mat_name',
        'mat_acronym',
        'cod_matter_migration',
        'cod_old_migration',
        'min_note'
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'mat_name', 'mat_acronym', 'cod_matter_migration', 'cod_old_migration', 'min_note',
        'tm_name', 'tm_acronym',
        'tc_name',
        'edu_name', 'edu_alias', 'edu_order',
        'st_name'
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
