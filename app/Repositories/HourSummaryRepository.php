<?php

namespace App\Repositories;

use App\Models\HourSummary;
use App\Repositories\Base\BaseRepository;

/**
 * HourSummaryRepository
 */
class HourSummaryRepository extends BaseRepository
{

    protected $relations = [
       'collaboratorHour',
       'status'
    ];

   /*  protected $fields = [
        'typ_doc_name'
    ]; */

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(HourSummary $hourSummary)
    {
        parent::__construct($hourSummary);
    }
}