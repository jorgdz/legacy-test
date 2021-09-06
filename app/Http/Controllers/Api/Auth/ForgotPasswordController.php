<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Custom\NotFoundException;
use App\Http\Controllers\Api\Contracts\IForgorPasswordController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use App\Traits\RestResponse;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller implements IForgorPasswordController
{
    use RestResponse;

    public function sendResetLinkResponse(ForgotPasswordRequest $request)
    {
        $user = User::where('us_username', $request->us_username)->first();

        if($user) {
            $response = Password::sendResetLink($request->only('us_username'));

            if($response === Password::RESET_LINK_SENT) {
                return $this->success(__('passwords.sent'));
            } else {
                throw new NotFoundException(__('messages.not-email'));
            }
        } else {
            throw new NotFoundException(__('messages.not-found'));
        }

    }

}
