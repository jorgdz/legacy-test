<?php

namespace App\Repositories;

use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Repositories\Base\BaseRepository;

class PermissionRepository extends BaseRepository
{
    protected $relations = ['status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Permission $permission) {
        parent::__construct($permission);
    }

    public function deleteRoleHasPermission($id) {
        DB::table('role_has_permissions')->where('permission_id', $id)->delete();
    }
}