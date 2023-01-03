<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $data = $request->all();
        
        $user = auth()->user();
       
        return $this->succ([
            'profile'=>$user
        ]);

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function self()
    {
        return $this->succ([
            "profile"=> auth()->user()
        ]);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user($userid)
    {
        
        $user = User::find($userid);

        if ($user)
        {
            return $this->succ(['profile' => $user]);
        }
        else {
            return $this->err(404, 'User not exists', 404);
        }
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function follow(Request $request)
    {
        $id = $request->json('id');
        return $this->succ(["result"=>'ok']);
    }

    public function unfollow(Request $request)
    {
        $id = $request->json('id');
        return $this->succ(["result"=>'ok']);
    }
}
