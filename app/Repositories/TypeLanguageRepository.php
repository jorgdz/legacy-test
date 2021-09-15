<?php

namespace App\Repositories;

use App\Models\TypeLanguage;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeLanguageRepository extends BaseRepository
{

    protected $relations = ['status', /* 'institutes', 'persons' */];
    protected $fields = ['typ_lan_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeLanguage $typeLanguage) {
        parent::__construct($typeLanguage);
    }
}
