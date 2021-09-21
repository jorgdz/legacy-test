<?php

namespace App\Repositories;

use App\Models\CategoryStatus;
use App\Repositories\Base\BaseRepository;

class CategoryStatusRepository extends BaseRepository
{
    protected $fields = ['cat_name', 'cat_description'];

    protected $relations = ['status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (CategoryStatus $categoryStatus) {
        parent::__construct($categoryStatus);
    }
}