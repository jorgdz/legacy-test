<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Support\Str;
use App\Models\CustomTenant;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use App\Models\StudentDocument;
use Illuminate\Support\Facades\DB;
use App\Cache\StudentDocumentCache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\Custom\NotFoundException;
use App\Http\Requests\StudentDocumentFormRequest;
use Illuminate\Support\Facades\File as FileFacade;
use App\Exceptions\Custom\FailLocalStorageRequestException;
use App\Http\Controllers\Api\Contracts\IStudentDocumentController;

class StudentDocumentController extends Controller implements IStudentDocumentController
{

    use RestResponse;

    private $studentDocumentCache;

    public function __construct(StudentDocumentCache $studentDocumentCache)
    {
        $this->studentDocumentCache = $studentDocumentCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->studentDocumentCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentDocumentFormRequest $request)
    {

        $bandFile = 0;
        $arrayNombreArchivos = [];
        $arrayEnlacesArchivos = [];

        //recorrer archivos
        foreach ($request->stu_doc_name_file as $key => $file) {

            //generar el nombre del archivo
            $idTenenant = CustomTenant::current()->id;
            $tenantName = CustomTenant::current()->name;
            $fechaHora = Carbon::now()->format('YmdHms'); //->toDateTimeString();
            $random = Str::random(10);
            $filename = $idTenenant . '-' . $random . '_' . $fechaHora . '.' . $file->getClientOriginalExtension();

            //crear un arreglo con los nombre del los archivos guardados
            //en storage
            array_push($arrayNombreArchivos, $filename);

            //guardar el archivo en el storage
            Storage::put($filename, FileFacade::get($file));
        }

        if (!$bandFile == 0)
            throw new FailLocalStorageRequestException(__("messages.no-content"));


        //recorrer array de archivos guardados en el storage
        for ($i = 0; $i < count($arrayNombreArchivos); $i++) {

            $stdDoc = new StudentDocument($request->all());
            $stdDoc->stu_doc_name_file = $arrayNombreArchivos[$i];
            $enlace = $stdDoc->stu_doc_url = url('/') . '/storage/' . $tenantName . '/' . $arrayNombreArchivos[$i];

            //en storage
            array_push($arrayEnlacesArchivos, $enlace);

            //guardar en base de datos
            $stdDoc = $this->studentDocumentCache->save($stdDoc);
        }

        //retornar la respuesta
        $stdDoc = new StudentDocument($request->all());
        $stdDoc->stu_doc_name_file =  $arrayNombreArchivos;
        $stdDoc->stu_doc_url =  $arrayEnlacesArchivos;

        return $this->success($stdDoc, Response::HTTP_CREATED);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentDocument $studentDocument)
    {
        DB::beginTransaction();
        try {
            $response = $this->studentDocumentCache->destroy($studentDocument);
            DB::commit();
            return $this->success($response);
        } catch (Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
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
        return $this->success($this->studentDocumentCache->find($id));
    }


    public function download($filename)
    {

        $tenantName = CustomTenant::current()->name;

        $file_path = storage_path() . '/app/' . $tenantName . '/' . $filename;


        if (!file_exists($file_path)) {
            throw new NotFoundException(__("messages.error-file-not-exist"));

           // return $this->information(__('messages.error-file-not-exist'), Response::HTTP_NOT_FOUND);
        }
        return Storage::download($filename);
    }


    //ACTUALIZAR
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(StudentDocumentFormRequest $request, StudentDocument $studentDocument)
    // {

    //     DB::beginTransaction();
    //     try {
    //         $studentDocument->fill($request->all());

    //         if ($studentDocument->isClean())
    //             return $this->information(__('messages.nochange'));

    //         $response = $this->typeDocumentCache->save($studentDocument);

    //         DB::commit();
    //         return $this->success($response);
    //     } catch (\Exception $ex) {
    //         DB::rollBack();
    //         return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
    //     }
    // }




}
