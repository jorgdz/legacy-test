<?php

namespace App\Http\Controllers\Api;

use App\Cache\AgreementCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IAgreementController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgreementRequest;
use App\Models\Agreement;
use App\Traits\Auditor;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgreementController extends Controller implements IAgreementController
{
    use RestResponse, Auditor;

    private $agreementCache;

    public function __construct(AgreementCache $agreementCache)
    {
        $this->agreementCache = $agreementCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->agreementCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgreementRequest $request)
    {
        $agreement = new Agreement($request->all());
        return $this->success($this->agreementCache->save($agreement), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->agreementCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(AgreementRequest $request, Agreement $agreement)
    {
        $agreement->fill($request->all());

        if ($agreement->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->agreementCache->save($agreement));
    }

    /**
     * enabled
     *
     * @param  mixed $agreement
     * @return void
     */
    public function enabled(Agreement $agreement)
    {
        if($agreement->status_id == 1)
            throw new UnprocessableException(__('messages.is-active'));

        $agreement->status_id = 1;
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Agreement::class)));
        return $this->success($this->agreementCache->save($agreement));
    }

    /**
     * disabled
     *
     * @param  mixed $agreement
     * @return void
     */
    public function disabled(Agreement $agreement)
    {
        if($agreement->status_id == 2)
            throw new UnprocessableException(__('messages.is-inactive'));

        $agreement->status_id = 2;
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Agreement::class)));
        return $this->success($this->agreementCache->save($agreement));
    }
}
