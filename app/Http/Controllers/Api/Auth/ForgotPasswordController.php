<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Custom\NotFoundException;
use App\Http\Controllers\Api\Contracts\IForgotPasswordController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller implements IForgotPasswordController
{
    use RestResponse;

    public function sendResetLinkResponse(ForgotPasswordRequest $request)
    {
        $user = User::where('us_username', $request->us_username)->first();

        if(!$user)
            return $this->information(__('passwords.email'), Response::HTTP_NOT_FOUND);

        $response = Password::sendResetLink([
            'email' => $user->email
        ]);

        return $response === Password::RESET_LINK_SENT ?
            $this->information(__('passwords.sent')) :
            $this->information(__('messages.not-email'), Response::HTTP_NOT_FOUND);
    }

}
