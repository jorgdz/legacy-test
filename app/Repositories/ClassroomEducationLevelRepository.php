<?php

namespace App\Repositories;

use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\ClassroomEducationLevel;


/**
 * CampusRepository
 */
class ClassroomEducationLevelRepository extends BaseRepository
{
    protected $relations = ['status','period','classRoom','educationLevel'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ClassroomEducationLevel $classroomEducationLevel) {
        parent::__construct($classroomEducationLevel);
    }

    public function saveMultiple($classrooms){
        return ClassroomEducationLevel::insert($classrooms);
    }

    public function changeStatus($id,$status){
        $classRoom = ClassroomEducationLevel::findOrFail($id);
        if($classRoom) {
            $classRoom->status_id = $status;
            $classRoom->save();
        }
        return $classRoom;
    }

    public function validateRegister($request){
        $currentClassrooms = $this->model
                                   ->where([
                                       ['period_id',$request->period_id],
                                       ['education_level_id',$request->education_level_id]
                                    ])
                                    ->distinct()
                                    ->pluck('classroom_id')
                                    ->toArray();
        $classrooms = array_merge(array_diff($request->classrooms, $currentClassrooms), array_diff($currentClassrooms, $request->classrooms));
        return $classrooms;
    }

    
}
