<?php

namespace App\Repositories;

use App\Models\TypeStudent;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class TypeStudentRepository extends BaseRepository
{
    protected $relations = ['status'];

    protected $fields = ['te_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeStudent $typeStudent) {
        parent::__construct($typeStudent);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $typeStudent) {
        $typeStudent->save();
        return $typeStudent;
    }
}
