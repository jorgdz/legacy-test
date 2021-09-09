<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeStudent;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\TypeStudentCache;
use App\Http\Controllers\Controller;;
use App\Http\Controllers\Api\Contracts\ITypeStudentController;

class TypeStudentController extends Controller implements ITypeStudentController
{
    //
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $typeStudentCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeStudentCache $typeStudentCache) {
        $this->typeStudentCache = $typeStudentCache;
    }

    /**
     * index
     *
     * List all type_students
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->typeStudentCache->all($request));
    }

    /**
     * show
     *
     * Profile by :id
     * @param  mixed $type_student
     * @return void
     */
    public function show (Request $request,$id) {
        return $this->success($this->typeStudentCache->find($id));
    }

    /**
     * store
     *
     * Add new profile
     * @param  mixed $profile
     * @return void
     */
    public function store (Request $request) {
        $typeStudentRequest = $request->all();

        $typeStudent = new TypeStudent($typeStudentRequest);
        return $this->success($this->typeStudentCache->save($typeStudent));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $profile
     * @return void
     */
    public function update (Request $request, TypeStudent $typeStudent) {
        $typeStudentRequest = $request->all();

        $typeStudent->fill($typeStudentRequest);
        if ($typeStudent->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->typeStudentCache->save($typeStudent));
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeStudent $typeStudent) {
        return $this->success($this->typeStudentCache->destroy($typeStudent));
    }
}
