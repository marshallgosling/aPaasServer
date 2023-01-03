<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            header("Content-Type: application/json; charset=UTF-8");
            header("status: 403");
            $msg = ['errorCode' => 403, 'message' => "Please login first"];
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
}
