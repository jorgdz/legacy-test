<?php

namespace App\Http\Controllers\Api;

use App\Cache\InstituteCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstituteRequest;
use App\Models\Institute;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InstituteController extends Controller
{
    use RestResponse;

    private $instituteCache;

    /**
     * __construct
     *
     * @param  mixed $instituteCache
     * @return void
     */
    public function __construct(InstituteCache $instituteCache)
    {
        $this->instituteCache = $instituteCache;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->instituteCache->all($request));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(InstituteRequest $request)
    {
        $institute = new Institute($request->all());
        $institute = $this->instituteCache->save($institute);
        return $this->success($institute, Response::HTTP_CREATED);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->instituteCache->find($id));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $institute
     * @return void
     */
    public function update(Request $request, Institute $institute)
    {
        $institute->fill($request->all());

        if($institute->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        return $this->success($this->instituteCache->save($institute));
    }

    /**
     * destroy
     *
     * @param  mixed $institute
     * @return void
     */
    public function destroy(Institute $institute)
    {
        return $this->success($this->instituteCache->destroy($institute));
    }
}
