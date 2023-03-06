<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Ecommerce\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OrderController extends ApiController
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

    public function list(Request $request)
    {
        $model = new Order();
        $user = auth()->user();

        $page = intval($request->get('currpage', 1));
        $pagesize = intval($request->get('pagesize', 20));
        $offset = ($page - 1) * $pagesize;

        $query = $model->with(['user:id,user_no','commodity'])->where('user_id', $user->id);

        $keywords = $request->get("keywords", '');
        if ($keywords) {
            $query = $query->where('order_no', 'like', '%'.$keywords.'%');
        }

        $data = $query->orderBy('id', 'desc')->offset($offset)->limit($pagesize)->get()->toArray();

        $count = $query->count();

        $result =[
            'order' => $data,
            'currpage' => $page,
            'pagesize' => $pagesize,
            'totalpage' => ceil($count / $pagesize),
            'totalrows' => $count
        ];

        return $this->succ($result);
    }

    public function detail($orderNo)
    {
        $order = Order::with(['user:id,user_no','commodity'])->where('order_no', $orderNo)->first();

        if (!$order) {
            return $this->err('404', 'Auction not exists', 404);
        }

        $user = auth()->user();

        if ($order->user_id != $user->id) {
            return $this->err('403', "You don't have the permission to see this order.", 403);
        }

        $auction = $order->toArray();

        return $this->succ(['order' => $auction]);
    }

}
