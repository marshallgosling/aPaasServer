<?php

namespace App\Http\Controllers\Ent;

use App\Http\Controllers\ApiController;
use App\Models\Ent\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class UsersController extends ApiController {

    protected $json = true;

    /**
     * RTM Token
     */
    public function getToken() {

    }

    public function login(Request $request) {
        $phone = $request->get("phone", "");
        //$code = '';

        // $user = [
        //     "id"=> 1, "openId"=>'', "userNo"=>"1213123","name"=>"heeeloo","headUrl"=>"","sex"=>"","mobile"=>$phone,"status"=>0,"token"=>""
        // ];

        $user = User::findByMobile($phone);

        if($user) {
            $user->headUrl = url("/storage/".$user->headUrl);
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$user];
        }
        else
            $result = ["code"=>404,"message"=>"User does not exists.","requestId"=>'',"data"=>null];
        
        return $this->responseJson($result);
    }

    public function getUserInfo(Request $request) {
        $userNo = $request->get("userNo", "");

        // $user = [
        //     "id"=> 1, "openId"=>'', "userNo"=>"1213123","name"=>"heeeloo","headUrl"=>"","sex"=>"","mobile"=>$phone,"status"=>0,"token"=>""
        // ];

        $user = User::findByMobile($userNo);

        if ($user) {
            $user->headUrl = url("/storage/".$user->headUrl);
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$user];
        }
        else
            $result = ["code"=>404,"message"=>"User does not exists.","requestId"=>'',"data"=>null];
        
        return $this->responseJson($result);
    }

    public function cancellation() {
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }

    public function update() {
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }

    public function verificationCode() {
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }


    public function ifQuiet(Request $request) {
        $roomNo = $request->get("roomNo");
        $userNo = $request->get("userNo");
        $status = $request->get("setStatus");
        $key = "Room_{$roomNo}_{$userNo}";
        $data = Redis::get($key);
        if ($data) {
            $seat = json_decode($data, true);
            $seat['isSelfMuted'] = $status;

            Redis::set($key, json_encode($seat));
        }
        
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }

    public function openCamera(Request $request) {
        $roomNo = $request->get("roomNo");
        $userNo = $request->get("userNo");
        $status = $request->get("setStatus");
        $key = "Room_{$roomNo}_{$userNo}";
        $data = Redis::get($key);
        if ($data) {
            $seat = json_decode($data, true);
            $seat['isVideoMuted'] = $status;

            Redis::set($key, json_encode($seat));
        }
        
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }
}