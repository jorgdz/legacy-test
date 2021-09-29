<?php

namespace App\Repositories;

use App\Models\CalificationModel;
use App\Repositories\Base\BaseRepository;

/**
 * CalificationModelRepository
 */
class CalificationModelRepository extends BaseRepository
{

    protected $relations = [
        'status'
    ];

    protected $fields = [
        'cal_mod_name',
        'cal_mod_acronym',
        'cal_mod_equivalence'
    ];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['matterMesh','status'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CalificationModel $calificationModel)
    {
        parent::__construct($calificationModel);
    }
}
