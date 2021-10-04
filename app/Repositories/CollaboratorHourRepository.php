<?php

namespace App\Repositories;

use App\Models\CollaboratorHour;
use App\Repositories\Base\BaseRepository;

/**
 * collaboratorHourRepository
 */
class collaboratorHourRepository extends BaseRepository
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