<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MailService;
use App\Services\SendinblueService;

class ExampleTestingController extends Controller
{
    private $mailService;

    /**
     * __construct
     *
     * @param  mixed $mailService
     * @return void
     */
    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * SendEmailExample
     *
     * @param  mixed $request
     * @return void
     */
    public function SendEmailExample(Request $request)
    {
        return $this->mailService->SendEmail($request);
    }
}
