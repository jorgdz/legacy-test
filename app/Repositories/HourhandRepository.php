<?php

namespace App\Repositories;

use App\Models\Hourhand;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class HourhandRepository extends BaseRepository
{
    protected $relations = ['status', 'periods']; //'courses'

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'hour_monday',
        'hour_tuesday',
        'hour_wednesday',
        'hour_thursday',
        'hour_friday',
        'hour_saturday',
        'hour_sunday',
        'hour_description'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Hourhand $hourhand) {
        parent::__construct($hourhand);
    }
}
