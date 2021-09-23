<?php

namespace App\Repositories;

use App\Models\TypeStudentProgram;
use App\Repositories\Base\BaseRepository;

/**
 * TypeStudentProgramRepository
 */
class TypeStudentProgramRepository extends BaseRepository
{

    protected $relations = [
       'status'
    ];

    protected $parents = ['status'];

    protected $selfFieldsAndParents = ['typ_stu_pro_name', 'typ_stu_pro_acronym', 'st_name'];

    protected $fields = [
        'typ_stu_pro_name','typ_stu_pro_acronym'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(TypeStudentProgram $typeStudentProgram)
    {
        parent::__construct($typeStudentProgram);
    }
}