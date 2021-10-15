<?php

namespace App\Repositories;

use App\Models\InstitutionSubject;
use App\Repositories\Base\BaseRepository;

class InstitutionSubjectRepository extends BaseRepository
{
    protected $relations = [
        'institute',
        'status'
    ];

    protected $parents = [
        'institutes',
        'status'
    ];

    protected $selfFieldsAndParents = [
        'name', 'inst_name', 'st_name'
    ];

    /**
     * __construct
     *
     * @param  mixed $institutionSubject
     * @return void
     */
    public function __construct(InstitutionSubject $institutionSubject)
    {
        parent::__construct($institutionSubject);
    }
}
