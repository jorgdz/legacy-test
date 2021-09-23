<?php

namespace App\Services;

use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Models\CustomTenant;
use App\Models\CustomFilesystem;
use App\Models\CustomTypeDocument;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class FilesystemService {

    use RestResponse;

    private $filesystem;
    private $http;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(GuzzleService $guzzle) {
        $this->http = $guzzle;
        $this->filesystem = CustomFilesystem::where('tenant_id', app('currentTenant')->id)->first();
    }
    
    /**
     * show
     *
     * @param  mixed $request
     * @return void
     */
    public function show(Request $request) {
        if ($this->filesystem) {
            $encode = base64_encode($request->name);
            //return $this->http->get(env('URI_API_DOC') . "descargar-archivo/{$encode}");
            return Redirect::to(config('app.api_doc_url') . "descargar-archivo/{$encode}");
        };

        return Storage::disk('s3')->response($request->name);
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request) {
        if ($this->filesystem) {
            $params = [
                "id_usuario"  => $this->filesystem["user_id"],
                "id_cliente"  => $this->filesystem["client_id"],
                "periodo"     => $request->period,
                "convert_pdf" => false,
                "files"       => $request->file('files'),
                "id_tipo_documento" => $request->type_document,
                "fecha_subida"      => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ];
            $guzzle = $this->http->uploadFileApiDocument(env('URI_API_DOC') . "v1/archivos/subir-archivo", $this->filesystem['token'], $params);

            $response = array();
            foreach ($guzzle["datosAdicionales"] as $key => $value) {
                array_push($response, [
                    'route' => $value,
                    'name'  => $value,
                    'url'   => "",
                ]);
            }
            return $this->success($response);
        }

        $tenant   = CustomTenant::findOrFail(CustomTenant::current()->id);
        $document = CustomTypeDocument::findOrFail($request->type_document);

        $response = array();
        foreach ($request->file('files') as $key => $value) {
            $path = $request->file('files')[$key]->store($tenant->name . (($request->period) ? "/{$request->period}" : "") . "/{$document->name}", 's3');
            array_push($response, [
                'route' => $path,
                'name'  => basename($path),
                'url'   => Storage::disk('s3')->url($path),
            ]);
        }

        return $this->success($response);
    }
    
    /**
     * download
     *
     * @param  mixed $request
     * @return void
     */
    public function download(Request $request) {
        if ($this->filesystem) {
            $encode = base64_encode($request->name);
            //return $this->http->get(env('URI_API_DOC') . "descargar-archivo/{$encode}");
            return Redirect::to(config('app.api_doc_url') . "descargar-archivo/{$encode}");
        };
        
        return Storage::disk('s3')->download($request->name);
    }
}