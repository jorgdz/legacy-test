<?php

namespace App\Repositories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class PermissionRepository extends BaseRepository
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Permission $permission) {
        parent::__construct($permission);
    }
}