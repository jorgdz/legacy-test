<?php

namespace App\Repositories;

use App\Models\AreaGroup;
use App\Repositories\Base\BaseRepository;

class AreaGroupRepository extends BaseRepository
{
    protected $relations = ['status'];

    protected $fields = ['arg_name', 'arg_description'];

    protected $parents = ['status'];

    protected $selfFieldsAndParents = ['st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(AreaGroup $areaGroup) {
        parent::__construct($areaGroup);
    }
    
    /**
     * assignEducationLevelSubjects
     *
     * @param  mixed $request
     * @return void
     */
    public function assignEducationLevelSubjects ($request) {

    }
}
