<?php

namespace App\Http\Controllers\Ent;

use App\Http\Controllers\ApiController;
use App\Models\Ent\User;
use App\Models\Ent\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class SongController extends ApiController {

    protected $json = true;

    public function getListPage(Request $request)
    {
        $json = <<<JSON
        {"records": [],
        "total": 1,
        "size": 10,
        "current": 0,
        "orders": [],
        "optimizeCountSql": true,
        "searchCount": true,
        "countId": null,
        "maxLimit": null,
        "pages": 1}
        JSON;
        $data = json_decode($json, true);

        $keyword = $request->get("name");
        $current = (int)$request->get("page");
        $pagesize = (int)$request->get('size', 10);

        $curr = $current * $pagesize;

        $records = Song::getPageList($keyword, $curr, $pagesize);
        $data['records'] = $records;
    
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$data];
        return $this->responseJson($result);
    }

    public function getList(Request $request)
    {
        $json = <<<JSON
        {"records": [],
        "total": 1,
        "size": 10,
        "current": 0,
        "orders": [],
        "optimizeCountSql": true,
        "searchCount": true,
        "countId": null,
        "maxLimit": null,
        "pages": 1}
        JSON;
        $data = json_decode($json, true);
        $songNo = $request->get("songNo", 0);
        $name = $request->get("name", "");

        if ($songNo) {
            $records = Song::where('song_no', $songNo)->first();
            $data['records'] = $records;
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$data];
            return $this->responseJson($result);
        }

        if ($name) {
            $records = Song::where('song_name', 'like', "%$name%")->get();
            $data['records'] = $records;
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$data];
            return $this->responseJson($result);
        }
        
    }

}