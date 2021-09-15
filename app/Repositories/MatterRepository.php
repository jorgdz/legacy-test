<?php

namespace App\Repositories;

use App\Models\Matter;
use App\Repositories\Base\BaseRepository;

class MatterRepository extends BaseRepository
{
    protected $relations = ['status', 'typeMatter', 'typeCalification'];
    protected $fields = [
        'mat_name', 'mat_acronym', 'cod_matter_migration', 'cod_old_migration', 'min_note'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Matter $matter) {
        parent::__construct($matter);
    }
}
