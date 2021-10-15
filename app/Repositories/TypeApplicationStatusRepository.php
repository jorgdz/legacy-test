<?php

namespace App\Repositories;

use App\Models\TypeApplicationStatus;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeApplicationStatusRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['typeApplication', 'status'];

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
    protected $fields = ['order'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'typ_app_name',
        'typ_app_description',
        'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeApplicationStatus $typeapplicationstatus) {
        parent::__construct($typeapplicationstatus);
    }
}
