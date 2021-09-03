<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class RoleRepository extends BaseRepository
{
    protected $relations = ['status'];
    protected $fields = ['name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Role $role) {
        parent::__construct($role);
    }
}