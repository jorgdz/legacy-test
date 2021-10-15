<?php

namespace App\Repositories;

use App\Models\ExternalHomologation;
use App\Repositories\Base\BaseRepository;

class ExternalHomologationRepository extends BaseRepository
{
    protected $relations = [
        'subject',
        'institutionSubject',
        'status'
    ];

    protected $parents = [
        'institution_subjects',
        'subjects',
        'status'
    ];

    protected $selfFieldsAndParents = [
        'comments', 'name', 'mat_name', 'cod_matter_migration', 'cod_old_migration',
        'mat_acronym', 'mat_translate', 'mat_payment_type', 'st_name'
    ];

    /**
     * __construct
     *
     * @param  mixed $externalHomologation
     * @return void
     */
    public function __construct(ExternalHomologation $externalHomologation)
    {
        parent::__construct($externalHomologation);
    }

    /**
     * findByConditionals
     *
     * @param  mixed $conditionals
     * @return void
     */
    public function findByConditionals($conditionals)
    {
        $query = $this->model;

        if (!empty($this->relations)) $query = $query->with($this->relations);

        return $query->where($conditionals)->first();
    }
}
