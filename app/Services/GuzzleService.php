<?php

namespace App\Services;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;

class GuzzleService {
    protected $client;

    public function __construct() {
        $this->client = new GuzzleClient();
    }

    public function uploadFileApiDocument($url, $token, $params) {
        $headers = [
            'Authorization' => "Bearer {$token}",
        ];
        try {
            $output = [];
            foreach ($params["files"] as $k => $v) {
                $output[] = [
                    'name'     => 'nombre_documento[]',
                    'contents' => fopen($v->getPathname(), 'r'),
                    'filename' => $v->getClientOriginalName()
                ]; 
            }
            $output[] = [
                'name'     => 'id_usuario',
                'contents' => $params["id_usuario"],
            ];
            $output[] = [
                'name'     => 'id_cliente',
                'contents' => $params["id_cliente"],
            ];
            $output[] = [
                'name'     => 'periodo',
                'contents' => $params["periodo"],
            ];
            $output[] = [
                'name'     => 'id_tipo_documento',
                'contents' => $params["id_tipo_documento"],
            ];
            $output[] = [
                'name'     => 'fecha_subida',
                'contents' => $params["fecha_subida"],
            ];
            $output[] = [
                'name'     => 'convert_pdf',
                'contents' => $params["convert_pdf"],
            ];

            $response = $this->client->post($url, [
                "headers"   => $headers,
                "multipart" => $output,
                "verify"    => env('SSL_GUZZLE', false),
            ]);
        } catch (ClientException $ex) {
            return json_decode($ex->getResponse()->getBody()->getContents(), true);
        }
        return json_decode($response->getBody()->getContents(), true);
    }

    public function get($url, $token = NULL) {
        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => "Bearer {$token}",
        ];
        $response = $this->client->get($url, [
            "headers" => $headers,
            "verify"  => env('SSL_GUZZLE', false),
        ]);
        return $response->getBody()->getContents();
    }
}