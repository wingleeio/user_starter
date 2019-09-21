<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     $response = [];

    //     if (!User::where('email', $request->email)->first()) {

    //         $response = [
    //             "email" => [
    //                 "type" => "Invalid Email",
    //                 "description" => trans('auth.email')
    //             ]
    //         ];

    //     } else if (!User::where('email', $request->email)->where('password', bcrypt($request->password))->first()) {
    //         $response = ["type" => "password", "message" => "Invalid Password", "description" => trans('auth.password')];
    //     }

    //     throw ValidationException::withMessages($response);
    // }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function login(Request $request)
    {

        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['user'] = $user;
            return response()->json($success, 200);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->token()->revoke();
        $user->token()->delete();

        return response()->json(null, 204);
    }
}
