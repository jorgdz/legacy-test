<?php

namespace App\Repositories;

use App\Models\Component;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * CampusRepository
 */
class ComponentRepository extends BaseRepository
{
    protected $fields    = ['com_acronym','com_name'];
    //protected $relations = ['status'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Component $component) {
        parent::__construct($component);
    }

    public function checkIfExist($request){
        $data = DB::table('components')   
                ->where('com_acronym', $request->com_acronym)
                ->whereNotNull('deleted_at')
                ->first();
        return $data;
    }
}
