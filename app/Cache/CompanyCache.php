<?php

namespace App\Cache;

use App\Repositories\CompanyRepository;
use Illuminate\Database\Eloquent\Model;

class CompanyCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CompanyRepository $companyRepository) {
        parent::__construct($companyRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($request) {
            return $this->repository->all($request);
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
        $this->cache::flush();
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->cache::flush();
        return $this->repository->delete($model);
    }
}
