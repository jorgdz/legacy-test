<?php

namespace App\Repositories;

use App\Models\Institute;
use App\Repositories\Base\BaseRepository;

class InstituteRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'city', 'typeInstitute'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['cities', 'type_institutes', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['inst_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'inst_name',
        'cit_name',
        'cit_acronym',
        'tin_name',
        'st_name'
    ];

    /**
     * __construct
     *
     * @param  mixed $institute
     * @return void
     */
    public function __construct(Institute $institute)
    {
        parent::__construct($institute);
    }
}
