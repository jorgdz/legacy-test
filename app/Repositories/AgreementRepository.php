<?php

namespace App\Repositories;

use App\Models\Agreement;
use App\Repositories\Base\BaseRepository;

class AgreementRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status'];

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
    protected $fields = ['agr_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['agr_name', 'st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Agreement $agreement) {
        parent::__construct($agreement);
    }
}
