<?php

namespace App\Repositories;

use App\Models\Pensum;
use App\Repositories\Base\BaseRepository;

class PensumRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'status',
        //  'meshs',
        //'studentRecords'
    ];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    // /**
    //  * fields
    //  *
    //  * @var array
    //  */
    // protected $fields = ['pen_name', 'pen_acronym', 'anio'];

    // /**
    //  * selfFieldsAndParents
    //  *
    //  * @var array
    //  */
    // protected $selfFieldsAndParents = [
    //     'pen_name', 'pen_acronym', 'anio',
    //     'st_name'
    // ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Pensum $pensum) {
        parent::__construct($pensum);
    }
}
