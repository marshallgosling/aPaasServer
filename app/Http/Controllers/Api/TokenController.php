<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Utilities\RtcTokenBuilder2;
use App\Utilities\RtmTokenBuilder2;
use App\Utilities\EducationTokenBuilder;
use Illuminate\Http\Request;

class TokenController extends ApiController {

    public function rtctoken(Request $request) {
        $channelname = $request->get("channel", "Migo");
        $uid = (int)$request->get("uid", "1");
        $appid = $request->get("appid", config("AppID-nate"));
        $token = RtcTokenBuilder2::buildTokenWithUid(
            $appid, config("Certificate-nate"), $channelname, $uid, 2, 3600, 3600
        );

        return $this->responseJson(['result'=>$token]);
    }

    public function rtmtoken(Request $request) {
        $uid = $request->get("uid", "Migo");
        $token = RtmTokenBuilder2::buildToken(
            config("AppID-nate"), config("Certificate-nate"), $uid, 24*3600
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
}