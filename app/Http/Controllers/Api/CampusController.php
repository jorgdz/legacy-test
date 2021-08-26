<?php

namespace App\Http\Controllers\Api;

use App\Models\Campus;
use App\Cache\CampusCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampusFormRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\ICampusController;

/**
 * CampusController maintenance
 */
class CampusController extends Controller implements ICampusController
{
    use RestResponse;

    private $campusCache;

    public function __construct(CampusCache $campusCache)
    {
        $this->campusCache = $campusCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->campusCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampusFormRequest $request)
    {
        $campus = new Campus($request->all());
        $campus = $this->campusCache->save($campus);
        return $this->success($campus, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->campusCache->find($id), Response::HTTP_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $campus->fill($request->all());

        if ($campus->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        return $this->success($this->campusCache->save($campus));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        return $this->success($this->campusCache->destroy($campus));
    }
}
