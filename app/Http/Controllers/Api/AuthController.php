<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AuthController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','logout']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $guard = auth('api');

        if (!$token = $guard->attempt($credentials)) {
            return response()->json(['code' => 403, 'message' => '登录失败，用户名或密码错误'], 200);
        }

        $user = $guard->user();
        
        return $this->responseJson([
            'token' => $token,
            'expireAt' => Carbon::now()->addMinutes($guard->factory()->getTTL())->toDateTimeString()
        ]);

    //  return $this->respondWithToken(0, '欢迎回来', [
    //         'user' => $user,
    //         'token' => $token,
    //         // 'permissions' => $permission,
    //         // 'roles' => $role,
    //         'expireAt' => Carbon::now()->addMinutes(auth()->factory()->getTTL())->toDateTimeString()
    //     ]);

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return $this->responseJson(auth('api')->user());
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return $this->responseJson(['msg' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->responseJson(["token"=>auth('api')->refresh()]);
    }

}
