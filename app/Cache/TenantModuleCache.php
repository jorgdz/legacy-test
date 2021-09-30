<?php

namespace App\Cache;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\TenantModuleRepository;

class TenantModuleCache extends BaseCache
{
    /**
     * __construct
     *
     * @param  mixed $tenantModuleRepository
     * @return void
     */
    public function __construct(TenantModuleRepository $tenantModuleRepository)
    {
        parent::__construct($tenantModuleRepository);
    }

    /**
     * clearCache
     *
     * @return void
     */
    public function clearCache()
    {
        $this->forgetCache('tenant-modules');
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
        $this->forgetCache('tenant-modules');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @param  mixed $model
     * @return void
     */
    public function destroy(Model $model)
    {
        $this->forgetCache('tenant-modules');
        return $this->repository->destroy($model);
    }
}
