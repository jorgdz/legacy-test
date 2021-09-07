<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;

class RoleRepository extends BaseRepository
{
    protected $relations = ['status', 'permissions'];
    protected $fields = ['name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Role $role) {
        parent::__construct($role);
    }

    public function deleteModelHasRole($id) {
        DB::connection('tenant')->table('model_has_roles')->where('role_id', $id)->delete();
    }
}