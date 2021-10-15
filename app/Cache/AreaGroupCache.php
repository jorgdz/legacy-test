<?php

namespace App\Cache;

use App\Exceptions\Custom\BadRequestException;
use App\Exceptions\Custom\ConflictException;
use App\Models\EducationLevelSubject;
use App\Repositories\AreaGroupRepository;
use Illuminate\Database\Eloquent\Model;

class AreaGroupCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(AreaGroupRepository $areaGroupRepository)
    {
        parent::__construct($areaGroupRepository);
    }

    /**
     *
     *
     * @param  mixed $request
     * @return model
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, $this->ttl, function () use ($request) {
            return $this->repository->all($request);
        });
    }

    /**
     *
     *
     * @param  mixed $id
     * @return model
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
     * @return model
     */
    public function save(Model $model)
    {
        $this->forgetCache('group-areas');
        return $this->repository->save($model);
    }

    /**
     *
     *
     * @return void
     */
    public function destroy(Model $model)
    {
        $this->forgetCache('group-areas');
        return $this->repository->destroy($model);
    }
    
    /**
     * assignEducationLevelSubjects
     *
     * @param  mixed $request
     * @return void
     */
    public function assignEducationLevelSubjects ($request, $id) {
        $this->forgetCache('group-areas');

        if (!isset($request->education_levels))
            throw new BadRequestException(__('messages.carrer-required'));
        
        if (!isset($request->subjects))
            throw new BadRequestException(__('messages.subjects-required'));
 
        foreach($request->subjects as $subject) {
            foreach ($request->education_levels as $elevel) {
                $_elevel = EducationLevelSubject::where('group_nivelation_id', $id)
                    ->where('subject_id', $subject)
                    ->where('education_level_id', $elevel)->first();
                
                if ($_elevel)
                    throw new ConflictException(__('messages.exist_education-level-subjects'));

                $educationLevelSubject = new EducationLevelSubject();
                $educationLevelSubject->group_nivelation_id = $id;
                $educationLevelSubject->subject_id = $subject;
                $educationLevelSubject->education_level_id = $elevel;
                $educationLevelSubject->save();
            }
        }
    }
}
