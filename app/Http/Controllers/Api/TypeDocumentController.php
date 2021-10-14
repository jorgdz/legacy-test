<?php

namespace App\Http\Controllers\Api;

use App\Cache\TypeDocumentCache;
use App\Http\Controllers\Api\Contracts\ITypeDocumentController;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeDocumentFormRequest;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use App\Traits\RestResponse;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TypeDocumentController extends Controller implements ITypeDocumentController
{

    use RestResponse;

    private $typeDocumentCache;

    public function __construct(TypeDocumentCache $typeDocumentCache)
    {
        $this->typeDocumentCache = $typeDocumentCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeDocumentCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeDocumentFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $typeDoc = new TypeDocument($request->all());
            $typeDoc = $this->typeDocumentCache->save($typeDoc);

            DB::commit();
            return $this->success($typeDoc, Response::HTTP_CREATED);
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
        return $this->success($this->typeDocumentCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeDocumentFormRequest $request, TypeDocument $typeDocument)
    {
        DB::beginTransaction();
        try {
            $typeDocument->fill($request->all());

            if ($typeDocument->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->typeDocumentCache->save($typeDocument);

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
    public function destroy(TypeDocument $typeDocument)
    {
        DB::beginTransaction();
        try {
            $response = $this->typeDocumentCache->destroy($typeDocument);
            DB::commit();
            return $this->success($response);
        } catch (Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
