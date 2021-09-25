<?php

namespace App\Cache;

use App\Repositories\MatterMeshRepository;
use Illuminate\Database\Eloquent\Model;

class MatterMeshCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(MatterMeshRepository $matterMeshRepository) {
        parent::__construct($matterMeshRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($request) {
            return $this->repository->all($request);
        });
    }

    /**
     * save
     *
     * @param  mixed $model
     * @return void
     */
    public function save(Model $model) {
        $this->forgetCache('mattermesh');

        $method = request()->method();

        if (in_array($method, ['POST'])) {

            $model->order = $model->max('order') + 1;
            
        } elseif (in_array($method, ['PATCH', 'PUT'])) {

            $old = $model->getOriginal('order');
            
            $new = $model->getAttributes()['order'];

            if ($old <> $new) {
                $this->repository->setMatterMesh($model->id, $old, $new);
                
                $model->order = $model->getOriginal('order');
            }

        }

        return $this->repository->save($model);
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    /**
     * showDependencies
     *
     * @param  mixed $model
     * @return void
     */
    public function showDependencies(Model $model) {
        return $this->cache::remember($this->key, $this->ttl, function() use ($model) {
            return $this->repository->showDependencies($model);
        });
    }

    /**
     * destroy
     *
     * @param  mixed $model
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('mattermesh');
        return $this->repository->destroy($model);
    }

    /**
     * findMatersbyMesh
     *
     * @param  mixed $id
     * @return void
     */
    public function findMatersbyMesh($request,$id) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($request,$id) {
            return $this->repository->findMatersbyMesh($request,$id);
        });
    }

}
