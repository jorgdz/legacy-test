<?php

namespace App\Repositories;

use App\Models\Mention;
use App\Repositories\Base\BaseRepository;

/**
 * MentionRepository
 */
class MentionRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
       'status'
    ];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'ment_name'
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'ment_name',
        'st_name'
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
