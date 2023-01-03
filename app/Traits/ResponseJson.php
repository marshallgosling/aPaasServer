<?php

namespace App\Traits;

trait ResponseJson
{
    protected function responseJson($data)
    {
        return $this->json?response()->json($data):response($data['result']);
    }

    protected function succ($data)
    {
        return response()->json($data);
    }

    protected function err($code, $msg, $status=401)
    {
        $data = ["errorCode" => $code, "message" => $msg];
        return response()->json($data, $status);
    }
}