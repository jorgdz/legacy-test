<?php

namespace App\Repositories;

use App\Models\Person;
use App\Models\Relative;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class RelativeRepository extends BaseRepository
{

    protected $relations = ['typeKinship','personRelative'];

    protected $fields    = ['rel_description'];

    protected $parents   = ['persons'];

    protected $selfFieldsAndParents = [
        'rel_description',
        'pers_identification',
        'pers_firstname',
        'pers_secondname',
        'pers_first_lastname',
        'pers_second_lastname',
    ];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Relative $relative) {
        parent::__construct($relative);
    }
}
