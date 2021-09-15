<?php

namespace App\Repositories;

use App\Models\Institute;
use App\Repositories\Base\BaseRepository;

class InstituteRepository extends BaseRepository
{

    protected $relations = ['status', 'city', 'typeInstitute'];
    protected $fields = ['inst_name'];

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
}
