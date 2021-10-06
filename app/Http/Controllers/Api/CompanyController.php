<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Cache\CompanyCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\ICompanyController;
use App\Http\Requests\CompanyFormRequest;

/**
 * CompanyController
 */
class CompanyController extends Controller implements ICompanyController
{
    use RestResponse;

    private $companyCache;

    /**
     * __construct
     *
     * @param  mixed $companyCache
     * @return void
     */
    public function __construct(CompanyCache $companyCache)
    {
        $this->companyCache = $companyCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->companyCache->all($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->companyCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, Company $company)
    {
        $company->fill($request->all());

        if ($company->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->companyCache->save($company));
    }
}
