<?php

namespace App\Repositories;

use App\Models\Agreement;
use App\Repositories\Base\BaseRepository;

class AgreementRepository extends BaseRepository
{
    /**
     * relations
     * (Models)
     * @var array
     */
    protected $relations = ['status','institute'];

    /**
     * parents
     * (Nombre _ Tablas Relacionadas)
     * @var array
     */
    protected $parents = ['status','institutes'];

    /**
     * fields
     * (Campos de los modelos )
     * @var array
     */
    protected $fields = ['agr_name','agr_start_date','agr_end_date'];

    /**
     * selfFieldsAndParents
     *(Campos a buscar)
     * @var array
     */
    protected $selfFieldsAndParents = ['agr_name', 'st_name','agr_start_date','agr_end_date','inst_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Agreement $agreement) {
        parent::__construct($agreement);
    }
}
