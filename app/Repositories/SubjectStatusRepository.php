<?php

namespace App\Repositories;

use App\Models\SubjectStatus;
use App\Repositories\Base\BaseRepository;

class SubjectStatusRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'typeMatter'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['type_subjects','status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['name', 'description'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'name', 'description', 'st_name',
        'tm_name', 'tm_acronym',
        'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (SubjectStatus $subjectStatus) {
        parent::__construct($subjectStatus);
    }
}
