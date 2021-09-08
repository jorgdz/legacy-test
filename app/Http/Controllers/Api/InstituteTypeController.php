<?php

namespace App\Http\Controllers\Api;

use App\Cache\InstituteTypeCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\ITypeInstitute;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstituteTypeRequest;
use App\Models\InstituteType;
use App\Repositories\InstituteTypeRepository;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InstituteTypeController extends Controller implements ITypeInstitute
{
    use RestResponse;

    private $instituteTypeCache;

    /**
     * __construct
     *
     * @param  mixed $instituteTypeCache
     * @return void
     */
    public function __construct(InstituteTypeCache $instituteTypeCache)
    {
        $this->instituteTypeCache = $instituteTypeCache;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->instituteTypeCache->all($request));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(InstituteTypeRequest $request)
    {
        $institutetype = new InstituteType($request->all());
        $institutetype = $this->instituteTypeCache->save($institutetype);
        return $this->success($institutetype, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->instituteTypeCache->find($id));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $institutetype
     * @return void
     */
    public function update(InstituteTypeRequest $request, InstituteType $institutetype)
    {
        $institutetype->fill($request->all());

        if($institutetype->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->instituteTypeCache->save($institutetype));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstituteType $institutetype)
    {
        return $this->success($this->instituteTypeCache->destroy($institutetype));
    }
}
