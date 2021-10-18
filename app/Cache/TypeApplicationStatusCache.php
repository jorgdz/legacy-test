<?php

namespace App\Cache;

use App\Models\Status;
use App\Models\TypeApplicationStatus;
use App\Repositories\TypeApplicationStatusRepository;
use Illuminate\Database\Eloquent\Model;

class TypeApplicationStatusCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(TypeApplicationStatusRepository $typeApplicationRepository) {
        parent::__construct($typeApplicationRepository);
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
    public function find ($id) {
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
        $this->forgetCache('typeApplicationsStatus');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('typeApplicationsStatus');
        return $this->repository->destroy($model);
    }

    public function validaStatus ($request) {
        return TypeApplicationStatus::where('type_application_id', $request->type_application_id);
    }

    public function createDefaultStatus ($request) {
        $tas = new TypeApplicationStatus();
        $tas->order = 0;
        $tas->type_application_id = $request->type_application_id;
        $tas->status_id = Status::where('st_name', 'Rechazado')->first()->id;
        $tas->save();

        $tas->typeApplicationStatusRoles()->delete();

        $tas2 = new TypeApplicationStatus();
        $tas2->order = 1;
        $tas2->type_application_id = $request->type_application_id;
        $tas2->status_id = Status::where('st_name', 'Enviado')->first()->id;
        $tas2->save();

        // Se proporcionan los roles enviados al orden creado.
        $tas->typeApplicationStatusRoles()->createMany($request->roles);
        $tas2->typeApplicationStatusRoles()->createMany($request->roles);
    }
}
