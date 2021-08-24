<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Api\Contracts\IAuthController;

/**
 * AuthController
 */
class AuthController extends Controller implements IAuthController
{

    use RestResponse;

    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('us_username', 'password')))
            throw new AuthenticationException();

        $user = User::where('us_username', $request['us_username'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
