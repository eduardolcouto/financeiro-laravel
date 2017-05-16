<?php

namespace Finlaravel\Http\Controllers\Api;

use Finlaravel\Http\Controllers\Controller;
use Finlaravel\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;


class AuthController extends Controller
{

    use AuthenticatesUsers;

    public function accessToken(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($token = Auth::guard('api')->attempt($credentials)){
            return $this->sendLoginResponse($request, $token);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function refreshToken(Request $request)
    {
        $token = Auth::guard('api')->refresh();
        return $this->sendLoginResponse($request, $token);
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        $message = Lang::get('auth.throttle', ['seconds' => $seconds]);

        return response()->json([
            'message' => $message
        ],403);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $message = Lang::get('auth.failed');

        return response()->json([
            'message' => $message
        ],400);
    }


    protected function sendLoginResponse(Request $request, $token)
    {
        return response()->json([
           'token' => $token
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
         Auth::guard('api')->logout();


        return response()->json([],204);
    }


}
