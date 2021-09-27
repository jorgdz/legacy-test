<?php

namespace App\Services;

use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Models\CustomTenant;
use App\Models\CustomTypeDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File as FileFacade;

class FilesystemService {

    use RestResponse;

    private $http;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(GuzzleService $guzzle) {
        $this->http = $guzzle;
    }

    /**
     * show
     *
     * @param  mixed $request
     * @return void
     */
    public function show(Request $request) {
        $currentTenant = CustomTenant::has('filesystem')
            ->where('id', CustomTenant::current()->id)->first();

        if ($currentTenant) {
            $encode = base64_encode($request->name);
            /*return $this->http->get(env('URI_API_DOC') . "descargar-archivo/{$encode}");*/
            return Redirect::to(config('app.api_doc_url') . "descargar-archivo/{$encode}");
        };

        return Storage::response($request->name);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request) {
        $currentTenant = CustomTenant::has('filesystem')
            ->where('id', CustomTenant::current()->id)->first();

        if ($currentTenant) {
            $params = [
                "id_usuario"  => $currentTenant->filesystem->user_id,
                "id_cliente"  => $currentTenant->filesystem->client_id,
                "periodo"     => $request->period,
                "convert_pdf" => false,
                "files"       => $request->file('files'),
                "id_tipo_documento" => $request->type_document,
                "fecha_subida"      => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ];
            $guzzle = $this->http->uploadFileApiDocument(config('app.api_doc_url') . "v1/archivos/subir-archivo", $currentTenant->filesystem->token, $params);

            $response = array();
            foreach ($guzzle["datosAdicionales"] as $key => $value) {
                array_push($response, [
                    'route' => $value,
                    'name'  => $value,
                    'url'   => "",
                ]);
            }
            return $response;
        }

        $tenant   = CustomTenant::findOrFail(CustomTenant::current()->id);
        $document = CustomTypeDocument::findOrFail($request->type_document);

        $path = $tenant->name . (($request->period) ? "/{$request->period}" : "") . "/{$document->name}";

        $response = array();
        foreach ($request->file('files') as $key => $value) {
            $name = time() . '_'. uniqid() . '.'. $request->file('files')[$key]->getClientOriginalExtension();
            $upload = Storage::put("{$path}/{$name}", FileFacade::get($request->file('files')[$key]));

            if ($upload) {
                array_push($response, [
                    'route' => "{$path}/{$name}",
                    'name'  => $name,
                    'url'   => Storage::url("{$path}/{$name}"),
                ]);
            }
        }

        return $response;
    }

    /**
     * download
     *
     * @param  mixed $request
     * @return void
     */
    public function download(Request $request) {
        $currentTenant = CustomTenant::has('filesystem')
            ->where('id', CustomTenant::current()->id)->first();

        if ($currentTenant) {
            $encode = base64_encode($request->name);
            /* return $this->http->get(env('URI_API_DOC') . "descargar-archivo/{$encode}"); */
            return Redirect::to(config('app.api_doc_url') . "descargar-archivo/{$encode}");
        };

        return Storage::download($request->name);
    }
}
