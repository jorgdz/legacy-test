<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Relative;
use Illuminate\Http\Request;
use App\Cache\RelativeCache;
//use App\Exceptions\Custom\ConflictException;
//use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IRelativeController;
use App\Traits\RestResponse;
use App\Http\Requests\RelativeFormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RelativeController extends Controller implements IRelativeController
{
    use RestResponse;

    /**
     * relativeCache
     *
     * @var mixed
     */
    private $relativeCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (RelativeCache $relativeCache) {
        $this->relativeCache = $relativeCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        return $this->success($this->relativeCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RelativeFormRequest $request)
    {
            $relative = new Relative($request->all());
            $relative = $this->relativeCache->save($relative);
            //$person = $this->relativeCache->find($relative->id);      
            return $this->success($this->relativeCache->find($relative->id), Response::HTTP_CREATED);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->relativeCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relative $relative)
    {
        $relative->fill($request->all());

        if ($relative->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->relativeCache->save($relative));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Relative  $relative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relative $relative)
    {
        return $this->success($this->relativeCache->destroy($relative));
        //return $this->success($response);
    }

}
