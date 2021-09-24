<?php

namespace App\Cache;

use App\Models\StudentRecord;
use App\Models\StudentRecordProgram;
use App\Repositories\StudentRecordProgramsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentRecordProgramsCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(StudentRecordProgramsRepository $studentRecordProgramsRepository)
    {
        parent::__construct($studentRecordProgramsRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, $this->ttl, function () use ($request) {
          
            return $this->repository->all($request);
        });
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id)
    {
        return $this->cache::remember($this->key, $this->ttl, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    /**
     * save
     *
     * @param  mixed $model
     * @return void
     */
    public function save(Model $model)
    {
        $this->forgetCache('student-record-program');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy(Model $model)
    {
        $this->forgetCache('student-record-program');
        return $this->repository->destroy($model);
    }

  


    public function allTypeStudentPrograms(Request $request, StudentRecordProgram $studentRecordProgram)
    {
        return $this->repository->allTypeStudentPrograms($request, $studentRecordProgram);
        // return $this->cache::remember($this->key, $this->ttl, function () use ($id) {
        //     return $this->repository->find($id);
        // });
    }

    
   
    
}
