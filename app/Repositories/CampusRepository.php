<?php

namespace App\Repositories;

use App\Models\Campus;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class CampusRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'periods'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['cam_name', 'cam_description', 'cam_direction', 'cam_initials'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'cam_name',
        'cam_description',
        'cam_direction',
        'cam_initials',
        'st_name'
    ];


    /**
     * selected
     *
     * @var array
     */
    protected $selected = ['id', 'cam_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Campus $campus) {
        parent::__construct($campus);
    }
}
