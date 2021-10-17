<?php

namespace App\Repositories;

use App\Models\GroupAreaSubject;
use App\Repositories\Base\BaseRepository;

class EducationLevelSubjectRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['groupArea', 'subject', 'status'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['group_areas', 'subjects', 'status'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['arg_description','arg_name', 'mat_name', 'cod_matter_migration', 'cod_old_migration', 'mat_translate', 'mat_description', 'mat_payment_type'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (GroupAreaSubject $groupAreaSubject) {
        parent::__construct($groupAreaSubject);
    }
}
