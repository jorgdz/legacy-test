<?php

namespace App\Repositories;

use App\Models\Collaborator;
use App\Repositories\Base\BaseRepository;

class CollaboratorRepository extends BaseRepository
{
    protected $relations = ['user','user.person', 'educationLevelPrincipal', 'position', 'status', 'educationLevels','campus', 'course'];//,'offersEducationLevels'

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'coll_email', 'coll_activity',
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
