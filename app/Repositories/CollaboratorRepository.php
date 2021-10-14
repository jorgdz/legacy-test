<?php

namespace App\Repositories;

use App\Models\Collaborator;
use App\Repositories\Base\BaseRepository;

class CollaboratorRepository extends BaseRepository
{
    protected $relations = ['educationLevels','campus','user','position','educationLevelPrincipal','status'];//,'offersEducationLevels'

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'user_id',
    ];

    /**
     * __construct
     *
     * @param  mixed $collaborator
     * @return void
     */
    public function __construct(Collaborator $collaborator)
    {
        parent::__construct($collaborator);
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return subjects by id mesh
     */
    public function find ($id) {
        $query = $this->model;

        $query = $query->with([
            'user',
            'user.person',
            'position',
            'EducationLevelPrincipal',
            'status',
            'status',
            'educationLevels',
            'campus',
            'course',
        ]);

        return $query->findOrFail($id);
    }

}
