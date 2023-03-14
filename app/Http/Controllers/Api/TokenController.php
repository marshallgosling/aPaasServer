<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Utilities\RtcTokenBuilder2;
use App\Utilities\RtmTokenBuilder2;
use App\Utilities\EducationTokenBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TokenController extends ApiController {

    protected $json = true;

    public function rtctoken(Request $request) {
        $channelname = $request->get("channel", "");
        $profile = $request->get("profile", "nate");
        $uid = (int)$request->get("uid", "");
        $appid = $request->get("appid", config("AppID-nate"));
        $cert = $request->get("cert", config("AppID-cert"));

        if (empty($appid) && empty($cert)) {
            $appid = config("AppID-".$profile);
            $cert = config("Certificate-".$profile);
        }

        $token = RtcTokenBuilder2::buildTokenWithUid(
            $appid, $cert, $channelname, $uid, 1, 86400, 0
        );

        if ($request->get("nojson")) {
            return $token;
        }
        return $this->responseJson(['result'=>$token]);
    }

    public function rtmtoken(Request $request) {
        $appid = $request->get("appid", config("AppID-nate"));
        $uid = $request->get("uid", "");
        $json = $request->get("nojson");
        if ($json) {
            $this->json = false;
        }
        $token = RtmTokenBuilder2::buildToken(
            $appid, config("Certificate-nate"), $uid, 24*3600
        );

        return $this->responseJson(['result'=>$token]);
    }

    public function edutoken(Request $request) {
        $uid = $request->get("uid", "Migo");
        $roomid = $request->get("room", "Class1");
        $token = EducationTokenBuilder::buildRoomUserToken(
            config("AppID-nate"), config("Certificate-nate"), $roomid, $uid, 1, 3600
        );

        return $this->responseJson(['result'=>$token]);
    }


    /**
     * Generate aPaas Token
     * "appCertificate": "d8f9f6762e494fcfaa8bed63de726ffb",
     * "appId":"72d8d5c7b38445e5bb26f1f270ee4649",
     * "expire":3600,
     * "src":"android",
     * "uid":"11111111",
     * "channelName": "demo11114443",
     * "types":[1,2,3]
     */
    public function apaasToken(Request $request) {
        $data = $request->all();

        $sample = json_decode($this->sample1, true);

        foreach(Arr::key($sample) as $key)
        {
            if (!Arr::exists($data, $key)) {
                return $this->err("404", "key {$key} not exists.", 404);
            }
        }

        $token = RtcTokenBuilder2::buildTokenWithUid(
            $data['appId'], $data['appCertificate'], $data['channelName'],
            $data['uid'], 2, 3600, 3600
        );

        $this->responseJson(
            [
                "code"=> 0,"msg"=> "success","tip"=> "this is demo api, don't use in production!",
                "data"=> [
                    "token" => $token
                ]
            ]);
    }


    public function imToken(Request $request) {
        $data = $request->all();


    }

    private $sample1 = <<<EOF
    {
        "appCertificate": "d8f9f6762e494fcfaa8bed63de726ffb",
        "appId":"72d8d5c7b38445e5bb26f1f270ee4649",
        "expire":3600,
        "src":"android",
        "uid":"11111111",
        "channelName": "demo11114443",
        "types":[1,2,3]
    }
    EOF;
}