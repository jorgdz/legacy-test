<?php

namespace App\Repositories;

use App\Models\Institute;
use App\Repositories\Base\BaseRepository;

class InstituteRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'province', 'typeInstitute', 'economicGroup'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['catalogs', 'type_institutes', 'status', 'economic_groups'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['inst_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'inst_name',
        'cat_name',
        'cat_acronym',
        'tin_name',
        'st_name',
        'eco_gro_name'
    ];

    /**
     * __construct
     *
     * @param  mixed $institute
     * @return void
     */
    public function __construct(Institute $institute)
    {
        parent::__construct($institute);
    }

    /**
     * searchByConditionals
     *
     * @param  mixed $conditionals
     * @param  mixed $keywords
     * @return void
     */
    public function searchByConditionals($conditionals, $keywords)
    {
        $response = $this->model->where($conditionals)->with('typeInstitute')
            ->whereHas('typeInstitute', function ($query) use ($keywords) {
                $query->whereIn('ti_keyword', $keywords);
            })->get();
        return json_decode(json_encode($response), true);
    }
}
