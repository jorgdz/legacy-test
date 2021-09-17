<?php

namespace App\Repositories;

use App\Models\Mention;
use App\Repositories\Base\BaseRepository;

/**
 * MentionRepository
 */
class MentionRepository extends BaseRepository
{

    protected $relations = [
       'status'
    ];

    protected $fields = [
        'ment_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Mention $mention)
    {
        parent::__construct($mention);
    }


    
}