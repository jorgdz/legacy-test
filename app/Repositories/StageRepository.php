<?php

namespace App\Repositories;

use App\Models\Stage;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;
use App\Exceptions\Custom\NotFoundException;

class StageRepository extends BaseRepository
{
    protected $relations = ['status','periodStages'];

    protected $fields = ['stg_name','stg_description','stg_acronym'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Stage $stage) {
        parent::__construct($stage);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $stage) {
        $stage->save();
        return $stage;
    }
}