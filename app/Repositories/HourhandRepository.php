<?php

namespace App\Repositories;

use App\Models\Hourhand;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class HourhandRepository extends BaseRepository
{
    protected $relations = ['status'];//,'hourhand_period','courses'

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Hourhand $hourhand) {
        parent::__construct($hourhand);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $hourhand) {
        $hourhand->save();
        return $hourhand;
    }
}