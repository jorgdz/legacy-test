<?php

namespace App\Repositories;

use App\Models\BloodType;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class BloodTypeRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['blo_typ_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['blo_typ_name', 'st_name'];

    protected $parents = ['status'];


    /**
     * __construct
     *
     * @return void
     */
    public function __construct (BloodType $bloodType) {
        parent::__construct($bloodType);
    }
}
