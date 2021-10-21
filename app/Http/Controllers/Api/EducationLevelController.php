<?php

namespace App\Http\Controllers\Api;

use App\Cache\EducationLevelCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Controller;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\IEducationLevelController;
use App\Http\Requests\EducationLevelFormRequest;
use App\Models\EducationLevel;
use App\Traits\TranslateException;
use Exception;

use Illuminate\Support\Facades\DB;

class EducationLevelController extends Controller implements IEducationLevelController
{
    use RestResponse, TranslateException;

    private $educationLevelCache;

    public function __construct(EducationLevelCache $educationLevelCache)
    {
        $this->educationLevelCache = $educationLevelCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->educationLevelCache->all($request));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationLevelFormRequest $request)
    {
        $educationLevel = new EducationLevel($request->all());
        $educationLevel = $this->educationLevelCache->save($educationLevel);

        return $this->success($educationLevel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->educationLevelCache->find($id));
    }

    /**
     * getChildren
     *
     * Buscara unicamente niveles educativos Padres.
     * Devolvera a sus hijos en array.
     *
     * @param  mixed $id
     * @return void
     */
    public function getOnlyParents()
    {
        $educationlevel = EducationLevel::with('children')->where('principal_id', null)->get();

        if (!$educationlevel)
            throw new UnprocessableException(__('messages.no-exist-instance', ['model' => $this->translateNameModel(class_basename(EducationLevel::class)) ]));

        return $this->success($educationlevel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationLevelFormRequest $request, EducationLevel $educationLevel)
    {
        DB::beginTransaction();
        try {
            $educationLevel->fill($request->all());

            if ($educationLevel->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->educationLevelCache->save($educationLevel);

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
    public function destroy(EducationLevel $educationLevel)
    {
        DB::beginTransaction();
        try {
            $response = $this->educationLevelCache->destroy($educationLevel);
            DB::commit();
            return $this->success($response);
        } catch (Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * getCollaboratorsPerEducationLvl
     *
     * @param  mixed $educationlevel
     * @return void
     */
    public function getCollaboratorsPerEducationLvl (EducationLevel $educationlevel, Request $request)
    {
        return $this->success($this->educationLevelCache->getCollaboratorsPerEducationLvl($educationlevel,$request));
    }


     /**
     * getChildren
     *
     * Devolvera niveles educativos Padres en un array.
     *
     * @param  mixed $id
     * @return void
     */
    public function getOnlyPrincipal()
    {
        return $this->success($this->educationLevelCache->getOnlyPrincipalCache());
    }
}
