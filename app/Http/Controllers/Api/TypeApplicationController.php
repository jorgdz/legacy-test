<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\RestResponse;
use App\Models\TypeApplication;
use App\Cache\TypeApplicationCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\ITypeApplicationController;
use App\Http\Requests\TypeApplicationRequest;
use Illuminate\Support\Facades\Auth;

class TypeApplicationController extends Controller implements ITypeApplicationController
{
    use RestResponse;

    private $typeApplicationCache;

    public function __construct(TypeApplicationCache $typeApplicationCache)
    {
        $this->typeApplicationCache = $typeApplicationCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request['conditions'] = [
            ['parent_id', NULL],
        ];
        return $this->success($this->typeApplicationCache->all($request));
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(TypeApplicationRequest $request)
    {
        $typeapplication = new TypeApplication($request->all());
        return $this->success($this->typeApplicationCache->save($typeapplication));
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->typeApplicationCache->find($id));
    }

    /**
     * getChildren
     *
     * @param  string $acronym
     * @return void
     */
    public function getChildren(string $acronym)
    {
        $typeApplicationCache= TypeApplication::where('typ_app_acronym', $acronym)->first();

        if (!$typeApplicationCache)
            return $this->information(__('messages.no-acronym'));

        return $this->success($this->typeApplicationCache->find($typeApplicationCache->id));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $typeapplication
     * @return void
     */
    public function update(TypeApplicationRequest $request, TypeApplication $typeapplication)
    {
        return $this->success($this->typeApplicationCache->save($typeapplication->fill($request->all())));
    }
    
    /**
     * destroy
     *
     * @param  mixed $typeapplication
     * @return void
     */
    public function destroy(TypeApplication $typeapplication)
    {
        return $this->success($this->typeApplicationCache->destroy($typeapplication));
    }
}
