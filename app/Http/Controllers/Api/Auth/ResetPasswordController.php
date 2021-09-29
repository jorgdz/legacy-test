<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Contracts\IResetPasswordController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use App\Traits\RestResponse;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller implements IResetPasswordController
{
    use RestResponse;

    public function verifyToken(Request $request, string $token)
    {
        $passwordReset = DB::connection('tenant')
            ->table('password_resets')
            ->where('email', $request->email)
            ->first();

        if(!$passwordReset || !Hash::check($token, $passwordReset->token))
            return $this->information(__('passwords.token'), Response::HTTP_CONFLICT);

        $user = User::where('email', $passwordReset->email)->first();
        return $this->success([
            'user' => $user,
            'token' => $token
        ]);

    }

    public function sendResetResponse(ResetPasswordRequest $request)
    {
        $input = $request->only('email','token', 'password', 'password_confirmation');
        $response = Password::reset($input, function ($user, $password) {

            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
            $user->setRememberToken(Str::random(60));
            event(new PasswordReset($user));

        });
        if($response != Password::PASSWORD_RESET)
           return $this->information(__('messages.not-email'), Response::HTTP_NOT_FOUND);

        return $this->success(__('passwords.reset'));
    }
}
