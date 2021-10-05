<?php

namespace App\Repositories;

use App\Models\OtherSignature;
use App\Repositories\Base\BaseRepository;

class OtherSignatureRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['type_report', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['sign_position', 'sign_person', 'sign_reference'];

    /**
     * parents
     * Name of rable relationals
     * @var array
     */
    protected $parents = ['type_reports', 'status'];

    /**
     * selfFieldsAndParents
     * Fields of table relationals
     * @var array
     */
    protected $selfFieldsAndParents = ['sign_position', 'sign_person', 'sign_reference', 'name', 'acronym', 'st_name'];


    /**
     * __construct
     *
     * @param  mixed $otherSignature
     * @return void
     */
    public function __construct(OtherSignature $otherSignature)
    {
        parent::__construct($otherSignature);
    }

    /**
     * saveMultiple
     *
     * @param  mixed $signatures
     * @return void
     */
    public function saveMultiple(array $signatures)
    {
        return OtherSignature::insert($signatures);
    }
}
