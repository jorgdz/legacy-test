<?php

namespace App\Repositories;

use App\Models\CollaboratorHour;
use App\Repositories\Base\BaseRepository;

/**
 * CollaboratorHourRepository
 */
class CollaboratorHourRepository extends BaseRepository
{

    protected $relations = [
       'hoursSummaries',
       'status',
    ];

    /* protected $fields = [
        'typ_doc_name'
    ]; */

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CollaboratorHour $collaboratorHour)
    {
        parent::__construct($collaboratorHour);
    }
}
