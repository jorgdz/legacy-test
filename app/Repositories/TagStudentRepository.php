<?php

namespace App\Repositories;

use App\Models\TagStudent;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TagStudentRepository extends BaseRepository
{

    protected $relations = ['status'];
    protected $fields = ['tg_name','tg_description'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TagStudent $tagStudent) {
        parent::__construct($tagStudent);
    }


}
