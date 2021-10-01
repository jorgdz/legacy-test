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
}
