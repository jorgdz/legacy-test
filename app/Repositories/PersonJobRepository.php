<?php

namespace App\Repositories;

use App\Models\PersonJob;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class PersonJobRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['person', 'city', 'status'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['cities', 'persons', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['per_job_organization', 'per_job_position', 'per_job_direction'];

    protected $selfFieldsAndParents = [
        'per_job_organization', 'per_job_position', 'per_job_direction',
        'cit_name', 'cit_acronym',
        'pers_identification', 'pers_firstname', 'pers_secondname', 'pers_first_lastname', 'pers_second_lastname', 'pers_gender',
        'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PersonJob $personjob) {
        parent::__construct($personjob);
    }
}
