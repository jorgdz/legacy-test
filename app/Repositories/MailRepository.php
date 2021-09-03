<?php

namespace App\Repositories;

use App\Models\Mail;
use App\Repositories\Base\BaseRepository;

class MailRepository extends BaseRepository
{
    protected $relations = ['tenant'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Mail $mail) {
        parent::__construct($mail);
    }
}