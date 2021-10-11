<?php

namespace App\Repositories;

use App\Models\EducationLevelSubject;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class EducationLevelSubjectRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['groupArea', 'period', 'educationLevel', 'subject'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['group_area', 'periods', 'education_levels', 'subjects'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['ga_name', 'per_name', 'edu_name', 'mat_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (EducationLevelSubject $educationLevelSubject) {
        parent::__construct($educationLevelSubject);
    }
}
