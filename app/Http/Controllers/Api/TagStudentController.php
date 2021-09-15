<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TagStudent;
use App\Cache\TagStudentCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\TagStudentFormRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Contracts\ITagStudentController;

class TagStudentController extends Controller implements ITagStudentController
{
    use RestResponse;

    private $tagStudentCache;

    public function __construct(TagStudentCache $tagStudentCache)
    {
        $this->tagStudentCache = $tagStudentCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->tagStudentCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStudentFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $tagStudent = new TagStudent($request->all());
            $tagStudent = $this->tagStudentCache->save($tagStudent);

            DB::commit();
            return $this->success($tagStudent, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TagStudent  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->tagStudentCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TagStudent  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TagStudent $tagstudent)
    {
        DB::beginTransaction();
        try {
            $tagstudent->fill($request->all());

            if ($tagstudent->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->tagStudentCache->save($tagstudent);

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
     * @param  \App\Models\TagStudent  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(TagStudent $tagstudent)
    {
        DB::beginTransaction();
        try {
            $response = $this->tagStudentCache->destroy($tagstudent);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
