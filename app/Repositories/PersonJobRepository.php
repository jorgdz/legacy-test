<?php

namespace App\Repositories;

use App\Models\PersonJob;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class PersonJobRepository extends BaseRepository
{
    protected $relations = ['person', 'city', 'status'];
    protected $fields = ['per_job_organization', 'per_job_position', 'per_job_direction'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PersonJob $personjob) {
        parent::__construct($personjob);
    }
}
