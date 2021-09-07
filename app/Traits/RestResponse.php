<?php

namespace App\Traits;

use Throwable;
use Illuminate\Http\Response;

trait RestResponse
{
	/**
	 * success
	 *
	 * @param  mixed $data
	 * @param  mixed $code
	 * @return void
	 */
	public function success ($data, $code = Response::HTTP_OK) {
        return response()->json($data, $code);
	}
	
	/**
	 * information
	 *
	 * @param  mixed $data
	 * @param  mixed $code
	 * @return void
	 */
	public function information ($message, $code = Response::HTTP_OK) {
        return response()->json([
            'timestamps' => date('Y-m-d H:i:s'),
            'path' => request()->path(),
            'detail' => $message,
            'code' => $code
        ], $code);
	}

	/**
	 * error
	 *
	 * @param  mixed $path
	 * @param  mixed $exception
	 * @param  mixed $message
	 * @param  mixed $code
	 * @return void
	 */
	public function error ($path, Throwable $exception, $message, $code) {
        return response()->json([
            'timestamps' => date('Y-m-d H:i:s'),
            'path' => $path,
            'exception' =>  basename(str_replace('\\', '/', get_class($exception))),
            'detail' => $message,
            'code' => $code
        ], $code);
	}
}
