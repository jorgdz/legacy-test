<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\Base\BaseRepository;

class PersonRepository extends BaseRepository
{


    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['identification', 'religion', 'statusMarital', 'city', 'currentCity', 'sector', 'ethnic', 'user', 'personJob', 'livingPlace', 'languages'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = [
        'cities',
        'sectors',
        'ethnics',
        'type_languages',
        'catalogs',
        'type_religions',
        'status_marital'
    ];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'pers_identification',
        'pers_firstname',
        'pers_secondname',
        'pers_first_lastname',
        'pers_second_lastname',
        'pers_gender'
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'pers_identification',
        'pers_firstname',
        'pers_secondname',
        'pers_first_lastname',
        'pers_second_lastname',
        'pers_gender',
        'cit_name',
        'cit_acronym',
        'sec_name',
        'sec_description',
        'sec_acronym',
        'eth_name',
        'eth_description',
        'typ_lan_name',
        'cat_name',
        'cat_acronym',
        'cat_description',
        'typ_rel_name',
        'sta_mar_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Person $person) {
        parent::__construct($person);
    }
}
