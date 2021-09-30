<?php

namespace App\Repositories;

use App\Models\Area;
use Illuminate\Support\Facades\DB;
use App\Repositories\Base\BaseRepository;

class AreaRepository extends BaseRepository
{
    protected $relations = ['status'];

    protected $fields = ['ar_name'];

    protected $parents = ['status'];

    protected $selfFieldsAndParents = ['ar_name', 'st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Area $area)
    {
        parent::__construct($area);
    }
}
