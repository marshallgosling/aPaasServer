<?php

namespace App\Traits;

trait ResponseJson
{
    protected function responseJson($data)
    {
        return $this->json?response($data)->header("Content-Type", "application/json"):response($data['result']);
    }

    protected function err($code, $msg)
    {
        $data = ["errorCode" => $code, "message" => $msg];
        return response($data)->header("Content-Type", "application/json");
    }
}