<?php

namespace App\Http\Controllers\Api;

use App\Cache\CollaboratorHourCache;
use App\Http\Controllers\Api\Contracts\ICollaboratorHourController;
use App\Http\Controllers\Controller;

use App\Http\Requests\CollaboratorHourFormRequest;
use App\Models\CollaboratorHour;
use App\Traits\RestResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CollaboratorHourController extends Controller implements ICollaboratorHourController
{

    use RestResponse;

    private $collaboratorHourCache;

    public function __construct(CollaboratorHourCache $collaboratorHourCache)
    {
        $this->collaboratorHourCache = $collaboratorHourCache;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->collaboratorHourCache->all($request));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollaboratorHourFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $collHour = new CollaboratorHour($request->all());
            $collHour = $this->collaboratorHourCache->save($collHour);

            DB::commit();
            return $this->success($collHour, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->collaboratorHourCache->find($id));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollaboratorHourFormRequest $request, CollaboratorHour $collaboratorHour)
    {
        DB::beginTransaction();
        try {
            $collaboratorHour->fill($request->all());

            if ($collaboratorHour->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->collaboratorHourCache->save($collaboratorHour);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollaboratorHour $collaboratorHour)
    {
        $response = $this->collaboratorHourCache->destroy($collaboratorHour);
     
        return $this->success($response);
     
    }
}
