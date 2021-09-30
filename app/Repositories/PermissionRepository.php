<?php

namespace App\Repositories;

use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Repositories\Base\BaseRepository;

class PermissionRepository extends BaseRepository
{
    protected $relations = ['status'];
    protected $fields = ['name', 'alias'];

    /**
     * __construct
     *
     * @param  mixed $permission
     * @return void
     */
    public function __construct (Permission $permission) {
        parent::__construct($permission);
    }
    
    /**
     * assignPermissionsByModule
     *
     * @param  mixed $connection
     * @param  mixed $conditions
     * @param  mixed $params
     * @return void
     */
    public function assignPermissionsByModule($connection, $conditions, $params) {
        DB::table("{$connection}.dbo.permissions")->where($conditions)->update($params);
    }
    
    /**
     * deleteRoleHasPermission
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteRoleHasPermission($id) {
        DB::connection('tenant')->table('role_has_permissions')->where('permission_id', $id)->delete();
    }
}