<?php

namespace App\Repositories;

use App\Models\StudentDocument;
use App\Repositories\Base\BaseRepository;

/**
 * StudentDocumentRepository.php
 */
class StudentDocumentRepository extends BaseRepository
{

    protected $relations = [
        'typeDocument','student','status'
    ];

    protected $fields = ['stu_doc_name_file'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(StudentDocument $studentDocument)
    {
        parent::__construct($studentDocument);
    }
}