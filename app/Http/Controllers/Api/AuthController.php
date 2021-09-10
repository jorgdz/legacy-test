<?php

namespace App\Http\Controllers\Api;

use App\Cache\UserCache;
use App\Models\User;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\UserFormRequest;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Api\Contracts\IAuthController;
use App\Http\Resources\UserResource as UserResource;
use App\Traits\Auditor;

/**
 * AuthController
 */
class AuthController extends Controller implements IAuthController
{

    use RestResponse;
    use Auditor;

    private $userCache;

    public function __construct(UserCache $userCache) {
        $this->userCache = $userCache;
    }

    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login (UserFormRequest $request) {
        if (!Auth::attempt(['us_username' => $request->us_username, 'password' => $request->password, 'status_id' => 1]))
            throw new AuthenticationException(__('messages.no-credentials'));

        $user = new UserResource(User::where('us_username', $request['us_username'])->firstOrFail());

        $token = $user->createToken('auth_token')->plainTextToken;
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(User::class)));

        return $this->success([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * whoami
     *
     * @return void
     */
    public function whoami (Request $request) {
        $user = User::findOrFail($request->user()->id);       
        return new UserResource($user);
    }

    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout (Request $request) {
        $this->userCache->logout();/* Cache::flush(); */
        $request->user()->tokens()->delete();
        return $this->success(['message' => 'Good by user.']);
    }
}
