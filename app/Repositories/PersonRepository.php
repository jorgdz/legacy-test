<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\Base\BaseRepository;

class PersonRepository extends BaseRepository
{


    protected $relations = ['identification', 'religion', 'statusMarital', 'city', 'currentCity', 'sector', 'ethnic', 'user', 'personJob','livingPlace'];
    protected $fields = ['pers_identification', 'pers_firstname', 'pers_secondname', 'pers_first_lastname', 'pers_second_lastname', 'pers_gender'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Person $person) {
        parent::__construct($person);
    }
}
