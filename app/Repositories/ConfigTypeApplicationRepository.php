<?php

namespace App\Repositories;

use App\Models\ConfigTypeApplication;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class ConfigTypeApplicationRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['typeApplication', 'applicationDetail', 'status'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['typeApplication', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['data_type', 'description', 'object_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'data_type',
        'description',
        'object_name',
        'typ_app_name',
        'typ_app_description'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ConfigTypeApplication $configtypeapplication) {
        parent::__construct($configtypeapplication);
    }
}
