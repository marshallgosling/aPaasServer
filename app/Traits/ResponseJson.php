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

    protected function err($code, $msg, $status=401, $option=false)
    {
        $data = ["errorCode" => $code, "message" => $msg];
        if ($option) {
            $data['data'] = $option;
        }
        return response()->json($data, $status);
    }
}