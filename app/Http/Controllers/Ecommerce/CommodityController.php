<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Ecommerce\Commodity;
use Illuminate\Http\Request;
use App\Models\User;

use Carbon\Carbon;

class CommodityController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function list(Request $request) {
        $model = new Commodity();

        $page = intval($request->get('currpage', 1));
        $pagesize = intval($request->get('pagesize', 20));
        $offset = ($page - 1) * $pagesize;

        $query = $model->with(['images'])->where('status', Commodity::STATUS_READY);

        $keywords = $request->get("keywords", '');
        if ($keywords) {
            $query = $query->where('name', 'like', '%'.$keywords.'%');
        }

        $data = $query->orderBy('id', 'desc')->offset($offset)->limit($pagesize)->get()->toArray();

        $count = $query->count();

        $result =[
            'commodity' => $data,
            'currpage' => $page,
            'pagesize' => $pagesize,
            'totalpage' => ceil($count / $pagesize),
            'totalrows' => $count
        ];

        return $this->succ($result);
    }

    public function item(Request $request) {
        $data = $request->all();

        if ($c = Commodity::find($data['id'])) {
            if ($c->user_id == $data['user_id']) {
                $c->update($data);

                return $this->succ(['commodity'=>$c->toArray()]);
            }
        }

        return $this->err(500, "update error", 500);
    }
}
