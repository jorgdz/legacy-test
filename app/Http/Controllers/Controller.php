<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @OA\Info(
 *    title="Service Rest-Full",
 *    version="1.0.1",
 *    description="Documentation Legacy ERP.",
 *   @OA\Contact(
 *       email="jdiaz@redlinks.com.ec"
 *   ),
 *   @OA\License(
 *       name="Apache 2.0",
 *       url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *   )
 * ),
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
