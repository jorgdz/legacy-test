<?php

namespace App\Repositories;

use App\Models\MatterStatus;
use App\Repositories\Base\BaseRepository;

class MatterStatusRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'typeMatter'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['type_matters','status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['name', 'description'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'name', 'description', 'st_name',
        'tm_name', 'tm_acronym',
        'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MatterStatus $matterStatus) {
        parent::__construct($matterStatus);
    }
}
