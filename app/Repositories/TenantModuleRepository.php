<?php

namespace App\Repositories;

use App\Models\TenantModules;
use App\Repositories\Base\BaseRepository;

class TenantModuleRepository extends BaseRepository
{
    protected $relations = ['tenant', 'module'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TenantModules $tenantModules) {
        parent::__construct($tenantModules);
    }
    
    /**
     * findByConditionals
     *
     * @param  mixed $conditionals
     * @return void
     */
    public function findByConditionals($conditionals) {
        $query = $this->model;

        if (!empty($this->relations)) $query = $query->with($this->relations);

        return $query->where($conditionals)->first();
    }
}