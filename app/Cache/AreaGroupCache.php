<?php

namespace App\Cache;

use App\Models\AreaGroup;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\AreaGroupRepository;
use App\Exceptions\Custom\BadRequestException;

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
     * findSubjectsByGroup
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function findSubjectsByGroup ($request, $id) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($request, $id) {
            return $this->repository->findSubjectsByGroup($request, $id);
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
    public function saveAreaGroupWithSubjects ($request) {
        $this->forgetCache('group-areas');

        if (!isset($request['subjects']))
            throw new BadRequestException(__('messages.subjects-required'));

        $model = new AreaGroup();
        $model->arg_name = $request['arg_name'];
        $model->arg_description = $request['arg_description'];
        $model->arg_keywords = $request['arg_keywords'];
        $model->status_id = $request['status_id'];
        $modelSave = $this->repository->save($model);
        $modelSave->groupAreaSubjects()->createMany($request['subjects']);

        return $modelSave;
    }
}
