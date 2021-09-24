<?php

namespace App\Repositories;

use App\Models\EmergencyContact;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class EmergencyContactRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'person', 'typeKinship'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['type_kinship', 'persons', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['em_ct_name', 'em_ct_first_phone', 'em_ct_second_phone'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'em_ct_name',
        'em_ct_first_phone',
        'em_ct_second_phone',
        'typ_kin_name',
        'st_name',
    ];


    /**
     * __construct
     *
     * @return void
     */
    public function __construct (EmergencyContact $emergencyContact) {
        parent::__construct($emergencyContact);
    }

    public function saveMultiple($emergencyContacts){
        return EmergencyContact::insert($emergencyContacts);
    }
}
