<?php

namespace App\Http\Controllers\Api;

use App\Cache\MentionCache;
use App\Http\Controllers\Api\Contracts\IMentionController;
use App\Http\Controllers\Controller;
use App\Traits\RestResponse;
use Illuminate\Http\Request;

class MentionController extends Controller implements IMentionController
{

    use RestResponse;

    private $mentionCache;

    public function __construct(MentionCache $mentionCache)
    {
        $this->mentionCache = $mentionCache;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->mentionCache->all($request));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->mentionCache->find($id));
    }


    
}
