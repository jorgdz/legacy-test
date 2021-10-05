<?php

namespace App\Repositories;

use App\Models\CollaboratorSignature;
use App\Repositories\Base\BaseRepository;

class CollaboratorSignatureRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['type_report', 'collaborator', 'position', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['sign_reference'];

    /**
     * parents
     * Name of rable relationals
     * @var array
     */
    protected $parents = ['type_reports', 'collaborators', 'positions', 'status'];

    /**
     * selfFieldsAndParents
     * Fields of table relationals
     * @var array
     */
    protected $selfFieldsAndParents = ['sign_reference', 'name', 'acronym', 'coll_email', 'pos_name', 'st_name'];

    /**
     * __construct
     *
     * @param  mixed $collaboratorSignature
     * @return void
     */
    public function __construct(CollaboratorSignature $collaboratorSignature)
    {
        parent::__construct($collaboratorSignature);
    }

    /**
     * saveMultiple
     *
     * @param  mixed $signatures
     * @return void
     */
    public function saveMultiple(array $signatures)
    {
        return CollaboratorSignature::insert($signatures);
    }
}
