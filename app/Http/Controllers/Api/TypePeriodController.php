<?php

namespace App\Http\Controllers\Api;

use App\Models\TypePeriod;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\TypePeriodCache;
use App\Http\Controllers\Controller;
use App\Exceptions\Custom\ConflictException;
use App\Http\Requests\StoreTypePeriodRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\ITypePeriodController;

class TypePeriodController extends Controller implements ITypePeriodController
{
    //
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $typePeriodCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypePeriodCache $typePeriodCache) {
        $this->typePeriodCache = $typePeriodCache;
    }

    /**
     * index
     *
     * List all profiles
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->typePeriodCache->all($request));
    }

    /**
     * show
     *
     * Profile by :id
     * @param  mixed $profile
     * @return void
     */
    public function show (Request $request,$id) {
        return $this->success($this->typePeriodCache->find($id));
    }

    /**
     * store
     *
     * Add new profile
     * @param  mixed $profile
     * @return void
     */
    public function store (StoreTypePeriodRequest $request) {
        $typePeriodRequest = $request->all();
        $typePeriodPreview = TypePeriod::where('tp_name','=',$typePeriodRequest['tp_name'])->get();
        if ($typePeriodPreview->isNotEmpty())
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(TypePeriod::class)]));
        
        $typePeriod = new TypePeriod($typePeriodRequest);
        return $this->success($this->typePeriodCache->save($typePeriod));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $profile
     * @return void
     */
    public function update (StoreTypePeriodRequest $request, TypePeriod $typePeriod) {
        $typePeriodRequest = $request->all();
        $typePeriodPreview = TypePeriod::where('tp_name','=',$typePeriodRequest['tp_name'])->get();
        if ($typePeriodPreview->isNotEmpty() && $typePeriodRequest['tp_name'] != $typePeriod['tp_name'] )
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(TypePeriod::class)]));

        $typePeriod->fill($typePeriodRequest);
        if ($typePeriod->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        return $this->success($this->typePeriodCache->save($typePeriod));
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypePeriod $typePeriod) {
        return $this->success($this->typePeriodCache->destroy($typePeriod));
    }
}
