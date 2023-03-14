<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Ecommerce\Auction;
use App\Models\Ecommerce\AuctionBid;
use App\Models\Ecommerce\AuctionCommodity;
use App\Models\Ecommerce\Commodity;
use App\Models\Ecommerce\Room;
use Carbon\Carbon;
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
            $bids = AuctionBid::with(["user:id,user_no"])
                ->where('auction_id', $data['auction_id'])
                ->where('commodity_id',$data['commodity_id'])
                ->where('status', AuctionBid::STATUS_VALID)
                ->orderBy('id', 'desc')
                ->limit(3)
                ->select('id','user_id',"price",'currency','created_at')
                ->get()
                ->toArray();
            $room->sync(Commodity::with(["images"])->find($data['commodity_id']), $bids);
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

    public function start(Request $request)
    {
        $data = $request->all();

        if (!Arr::exists($data, 'auction_id')) {
            return $this->err('404', 'Auction ID must not be null. ', 404);
        }

        if (!Arr::exists($data, 'commodity_id')) {
            return $this->err('404', 'Commodity ID must not be null. ', 404);
        }
       
        $auction = Auction::find($data['auction_id'])->first();
        if (!$auction) {
            return $this->err('404', 'Auction not exists. ', 404);
        }

        $commodity = Commodity::find($data['commodity_id'])->first();
        if (!$commodity) {
            return $this->err('404', 'Commodity not exists. ', 404);
        }

        $user = auth()->user();

        if ($auction->owner_id != $user->id) {
            return $this->err('401', 'You don\'t have the permission to start the auction.', 403);
        }

        if ($commodity->user_id != $user->id) {
            return $this->err('402', 'You don\'t have the permission to start the auction.', 403);
        }

        $auction = AuctionCommodity::where('auction_id', $data['auction_id'])
            ->where('commodity_id', $data['commodity_id'])
            ->ordeBy('id', 'desc')->first();

        if ($auction) {
            if ($auction->status != AuctionCommodity::STATUS_STOPED) {
                return $this->err('406', 'Auction is already started. ', 406);
            }
        }
        else {
            $data['status'] = AuctionCommodity::STATUS_READY;

            $auction = AuctionCommodity::create($data);

            if (!$auction) {
                return $this->err('406', 'Auction starting failed.', 406);
            }
            
            $auction->start();

            return $this->succ(
                ["auction" => $auction->toArray()]
            );
        }
    }

}
