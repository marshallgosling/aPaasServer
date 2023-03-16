<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Utilities\RtcTokenBuilder2;
use App\Utilities\RtmTokenBuilder2;
use App\Utilities\EducationTokenBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class NcsController extends ApiController {

    protected $json = true;

    public function hook(Request $request) {
        Log::channel('ncs')->info(json_encode($request->all()));
    }

}