<?php

namespace App\Cache;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\TypeSubjectRepository;

class TypeSubjectCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(TypeSubjectRepository $typeSubjecRepository) {
        parent::__construct($typeSubjecRepository);
    }

    /**
     *
     *
     * @param  mixed $request
     * @return model
     */
    public function all($request) {
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
    public function find ($id) {
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
    public function save(Model $model) {
        $this->forgetCache('type-subjects');

        $method = request()->method();
        if (in_array($method, ['POST'])) {
            $model->tm_order = $model->max('tm_order') + 1;
        } elseif (in_array($method, ['PATCH', 'PUT'])) {
            $old = $model->getOriginal('tm_order');
            $new = $model->getAttributes()['tm_order'];
            if ($old <> $new) {
                $conditions = [
                    ['tm_order', $new],
                ];
                $params = [
                    'tm_order' => $old,
                ];
                $this->repository->setTypeMatter($conditions, $params);
            }
        }

        return $this->repository->save($model);
    }

    /**
     *
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('type-subjects');
        return $this->repository->destroy($model);
    }
}
