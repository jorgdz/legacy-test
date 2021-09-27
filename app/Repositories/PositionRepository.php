<?php

namespace App\Repositories;

use App\Models\Position;
use App\Repositories\Base\BaseRepository;

class PositionRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'role'];
    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['roles', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['pos_name'];

    protected $selfFieldsAndParents = [
        'pos_name',
        'st_name',
        'name'
    ];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Position $position) {
        parent::__construct($position);
    }
}
