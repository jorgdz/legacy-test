<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Base\BaseRepository;

/**
 * CompanyRepository
 */
class CompanyRepository extends BaseRepository
{

    protected $relations = ['campus', 'status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Company $company) {
        parent::__construct($company);
    }
}
