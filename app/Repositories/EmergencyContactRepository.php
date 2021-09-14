<?php

namespace App\Repositories;

use App\Models\EmergencyContact;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class EmergencyContactRepository extends BaseRepository
{

    protected $relations = ['status'];
    protected $fields = ['em_ct_name', 'em_ct_first_phone', 'em_ct_second_phone'];

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
