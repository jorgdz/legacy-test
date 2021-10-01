<?php

namespace App\Repositories;

use App\Models\TypeSubject;
use App\Repositories\Base\BaseRepository;

class TypeSubjectRepository extends BaseRepository
{

    protected $relations = ['status'];
    protected $fields = ['tm_name', 'tm_acronym'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeSubject $typeSubject) {
        parent::__construct($typeSubject);
    }
    
    /**
     * setTypeMatter
     *
     * @param  mixed $conditions
     * @param  mixed $params
     * @return void
     */
    public function setTypeMatter($conditions, $params) {
        return TypeSubject::where($conditions)->update($params);
    }
}
