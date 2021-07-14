<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use AuthenticatesUsers;


    public function index()
    {
        return response()->json([
            User::all()
        ], 200);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        $token = JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    public function responseToken($token)
    {
        return $token ? ['token' => $token] :
                        response()->json([
                           'error' => Lang::get('auth.failed')
                        ], 400);
    }

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->noContent();
    }
}
