<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;

class RoleRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'position', 'permissions'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Role $role) {
        parent::__construct($role);
    }

    /**
     * deleteModelHasRole
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteModelHasRole($id) {
        DB::connection('tenant')->table('model_has_roles')->where('role_id', $id)->delete();
    }
}
