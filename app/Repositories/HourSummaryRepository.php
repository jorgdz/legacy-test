<?php

namespace App\Repositories;

use App\Models\HourSummary;
use App\Repositories\Base\BaseRepository;

/**
 * HourSummaryRepository
 */
class HourSummaryRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'collaborator',
        'educationLevel',
        'period',
        'status'
    ];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = [
        'collaborators',
        'education_levels',
        'periods',
        'status'
    ];

    
    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'mes_name',
        'mes_res_cas',
        'mes_res_ocas',
        'mes_cod_career',
        'mes_title',
        'mes_itinerary',
        'mes_creation_date',
        'mes_acronym',
        'anio',
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'mes_name', 'mes_res_cas', 'mes_res_ocas', 'mes_cod_career', 'mes_title', 'mes_itinerary', 'mes_creation_date',
        'mes_acronym', 'anio', 'cat_name', 'cat_acronym', 'tc_name', 'edu_name', 'edu_alias', 'edu_order', 'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(HourSummary $hourSummary)
    {
        parent::__construct($hourSummary);
    }
}
