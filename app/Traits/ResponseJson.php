<?php

namespace App\Traits;

trait ResponseJson 
{
    protected function responseJson($data)
    {      
        return $this->json?response($data)->header("Content-Type", "application/json"):response($data['result']);
    }
}