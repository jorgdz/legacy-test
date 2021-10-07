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
    protected $relations = ['status', 'province', 'typeInstitute', 'economicGroup'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['catalogs', 'type_institutes', 'status', 'economic_groups'];

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
        'cat_name',
        'cat_acronym',
        'tin_name',
        'st_name',
        'eco_gro_name'
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

    /**
     * @override
     * findByConditionals
     *
     * @param  mixed $conditionals
     * @return void
     */
    public function findByConditionals($conditionals)
    {
        return $this->model->where($conditionals)->firstOrFail();
    }
}
