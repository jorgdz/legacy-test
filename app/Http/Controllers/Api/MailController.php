<?php

namespace App\Http\Controllers\Api;

use App\Models\Mail;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\MailRepository;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IMailController;

class MailController extends Controller implements IMailController
{
    use RestResponse;

    private $repository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MailRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $mails = $this->repository->all($request);
        return $this->success($mails);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $mail = $this->repository->find($id);
        return $this->success($mail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail) {
        DB::beginTransaction();
        try {
            $mail->fill($request->all());

            if ($mail->isClean())
                throw new UnprocessableException(__('messages.nochange'));

            $response = $this->repository->save($mail);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
