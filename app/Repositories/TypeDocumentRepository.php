<?php

namespace App\Repositories;

use App\Models\TypeDocument;
use App\Repositories\Base\BaseRepository;

/**
 * TypeDocumentRepository
 */
class TypeDocumentRepository extends BaseRepository
{

    protected $relations = [
        'status'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(TypeDocument $typeDocument)
    {
        parent::__construct($typeDocument);
    }
}