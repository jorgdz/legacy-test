<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;
use App\Cache\ProfileCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
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
        $profiles = $this->repoProfile->all($request);
        return $this->success($profiles);
    }

    /**
     * show
     *
     * Profile by :id
     * @param  mixed $profile
     * @return void
     */
    public function show (Profile $profile) {
        return $this->success($profile, Response::HTTP_FOUND);
    }

    /**
     * store
     *
     * Add new profile
     * @param  mixed $profile
     * @return void
     */
    public function store (StoreProfileRequest $request) {
        $profile = new Profile($request->all());
        $profile = $this->repoProfile->save($profile);
        return $this->success($profile, Response::HTTP_CREATED);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $profile
     * @return void
     */
    public function update (StoreProfileRequest $request, Profile $profile) {
        $profile->fill($request->all());
        if ($profile->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        $profile->save();
        return $this->success($profile);
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile) {
        Cache::flush();
        $profile->delete();
        return $this->success($profile);
    }
}
