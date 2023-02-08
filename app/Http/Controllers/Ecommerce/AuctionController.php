<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Auction as ModelsAuction;
use App\Models\Ecommerce\Auction;
use App\Models\Ecommerce\AuctionCommodity;
use App\Models\Ecommerce\Commodity;
use App\Models\Ecommerce\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AuctionController extends ApiController
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

    public function list($roomNo, Request $request) {
        $model = new Auction();

        $room = Room::findByRoomNo($roomNo);

        if (!$room) {
            return $this->err('404', "Room $roomNo not exists.", 404);
        }

        $page = intval($request->get('currpage', 1));
        $pagesize = intval($request->get('pagesize', 20));
        $offset = ($page - 1) * $pagesize;

        $query = $model->with(['user:id,user_no','commodity'])->where('room_id', $room->id);

        $keywords = $request->get("keywords", '');
        if ($keywords) {
            $query = $query->where('name', 'like', '%'.$keywords.'%');
        }

        $data = $query->orderBy('id', 'desc')->offset($offset)->limit($pagesize)->get()->toArray();

        $count = $query->count();

        $result =[
            'auction' => $data,
            'currpage' => $page,
            'pagesize' => $pagesize,
            'totalpage' => ceil($count / $pagesize),
            'totalrows' => $count
        ];

        return $this->succ($result);
    }

    public function detail($auctionId)
    {
        $auction = Auction::with(['user:id,user_no','commodity'])->find($auctionId);

        if (!$auction) {
            return $this->err('404', 'Auction not exists', 404);
        }

        $auction = $auction->toArray();

        return $this->succ(['auction' => $auction]);
    }


    public function bid(Request $request)
    {
        $data = $request->all();

        if (!Arr::exists($data, 'auction_id')) {
            return $this->err('404', 'Auction ID must not be null. ', 404);
        }

        if (!Arr::exists($data, 'commodity_id')) {
            return $this->err('404', 'Commodity ID must not be null. ', 404);
        }

        $auction = AuctionCommodity::findByID($data['auction_id'], $data['commodity_id']);

        if (!$auction) {
            return $this->err('404', 'Auction does not exist.', 404);
        }

        $user = auth()->user();

        if (!Arr::exists($data, 'currency')) {
            $data['currency'] = $auction->commodity->currency;
        }

        $result = $auction->processBid($user->id, $data['price'], $data['currency']);

        if ($result['result']) {

            $room = Room::find(Auction::find($data['auction_id'])->room_id);
            $room->sync(Commodity::find($data['commodity_id']));
        }
        return $this->succ(
            ["bid" => $result]
        );

    }

    public function sync(Request $request)
    {
        $data = $request->all();

        if (!Arr::exists($data, 'room_no')) {
            return $this->err('404', 'Room ID must not be null. ', 404);
        }

        $room = Room::findByRoomNo($data['room_no'])->first();
        if (!$room) {
            return $this->err('404', 'Room not exists. ', 404);
        }

        Auction::where('room_id', $room->id)
            //->where('status', Auction::STATUS_READY)
            ->update('status', Auction::STATUS_SYNCING);

    }

}
