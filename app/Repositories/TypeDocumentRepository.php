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

    protected $fields = [
        'typ_doc_name'
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