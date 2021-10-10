<?php

namespace App\Http\Controllers\Api;

use App\Cache\UserCache;
use App\Models\User;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserFormRequest;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Api\Contracts\IAuthController;
use App\Http\Resources\UserResource as UserResource;
use App\Models\PersonalAccessToken;
use App\Traits\Auditor;
use App\Traits\Helper;
use Illuminate\Support\Facades\Cache;

/**
 * AuthController
 */
class AuthController extends Controller implements IAuthController
{

    use RestResponse, Helper;
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

        $user = User::with([
            'userProfiles.status',
            'userProfiles.profile',
            'person.identification',
            'userProfiles.roles.permissions',
            'userProfiles' => fn ($query) =>
                $query->whereHas('roles', fn ($query) => $query->where('status_id', 1))
        ])->where('us_username', $request['us_username'])->firstOrFail();

        if (!$user->userProfiles || count($user->userProfiles) <= 0)
            throw new AuthenticationException(__('messages.no-roles-assign'));

        $user = new UserResource($user);

        $token = $user->createToken('auth_token')->plainTextToken;

        [$id, $aux_token] = explode('|', $token, 2);

        $key = request()->getHost(). "_find_token_{$id}";
        Cache::remember($key, now()->addMinutes(150), function () use ($id) {
            return PersonalAccessToken::find($id);
        });

        $userAuth = Cache::remember($this->generateKeyUserAuth($token), now()->addMinutes(150),
            function () use ($user) {
                return $user;
            }
        );

        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(User::class)));

        return $this->success([
            'token_type' => 'Bearer',
            'access_token' => $token,
            'user' => $userAuth,
        ]);
    }

    /**
     * whoami
     *
     * @return void
     */
    public function whoami (Request $request) {
        [$typeToken, $token] = explode('Bearer ', $request->header('Authorization'));
        return Cache::remember($this->generateKeyUserAuth($token), now()->addMinutes(150), function () use ($request) {
            return new UserResource(User::with([
                'userProfiles.roles.permissions',
                'userProfiles.status',
                'userProfiles.profile',
                'person.identification'
            ])->findOrFail($request->user()->id));
        });
    }

    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout (Request $request) {
        $this->userCache->logout();
        $request->user()->tokens()
            ->where('id', $request->user()->currentAccessToken()->id)
            ->delete();

        return $this->success(['message' => 'Good by user.']);
    }

    /**
     * logout-all-devices
     *
     * @param  mixed $request
     * @return void
     */
    public function logout_all_devices (Request $request) {
        $this->userCache->logout();
        $request->user()->tokens()
            ->delete();

        return $this->success(['message' => 'Good by user.']);
    }
}
