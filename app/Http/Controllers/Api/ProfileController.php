<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Profile;
use App\Cache\ProfileCache;
use App\Models\UserProfile;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IProfileController;

class ProfileController extends Controller implements IProfileController
{
    //
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $repoProfile;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ProfileCache $repoProfile) {
        $this->repoProfile = $repoProfile;
    }

    /**
     * index
     *
     * List all profiles
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->repoProfile->all($request));
    }

    /**
     * show
     *
     * Profile by :id
     * @param  mixed $profile
     * @return void
     */
    public function show (Request $request,Profile $profile) {
        return $this->success($this->repoProfile->find($profile->id));
    }

    /**
     * store
     *
     * Add new profile
     * @param  mixed $profile
     * @return void
     */
    public function store (StoreProfileRequest $request) {
        $profileRequest = $request->all();

        $profile = new Profile($profileRequest);
        return $this->success($this->repoProfile->save($profile));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $profile
     * @return void
     */
    public function update (UpdateProfileRequest $request, Profile $profile) {
        $profileRequest = $request->all();

        $profile->fill($profileRequest);
        if ($profile->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->repoProfile->save($profile));
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile) {
        return $this->success($this->repoProfile->destroy($profile));
    }

    /**
     * showUser
     *
     * @param  mixed $request
     * @param  mixed $profile
     * @return void
     */
    public function showUsers (Request $request, Profile $profile) {
        return $this->success($this->repoProfile->showUsers($profile));
    }
}
