<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Jobs\BidJob;
use App\Models\Bid;
use App\Models\Auction;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class AuctionController extends ApiController {

    protected $json = true;

    public function bid(Request $request) {
        
        $uid = $request->json("uid", "uid");
        //$amount = $request->json("amount", 0);
        $auction_id = $request->json("id", "0");
        
        if ($auction_id == '0') {
            return $this->responseJson(['result'=>'auction id is null']);
        }

        // Queue
        //$bidjob = new BidJob(compact(['uid', 'channelid', 'amount', 'bid_id']));
        //$bidjob->dispatch();

        // MySQL
        $auction = Auction::find($auction_id);
        if ($auction) {
            $amount = $auction->amount + 10;
            $channelid = $auction->channelid;

            Log::info("User Bid: uid {$uid} channelid {$channelid} amount{$amount}");

            $result = $auction->processBid($auction_id, $uid, $amount);
        } else {
            $result = ['reason'=>'Auction is not exists.'];
        }

        if ($result['result']) {
            $channel = Channel::find($channelid);
            if ($channel) {
                $channel->sync();
            }
        }

        return $this->responseJson(['result'=>$result['reason']]);
    }


    public function get(Request $request)
    {
        $id = $request->get("id", "0");

        $auction = Auction::findOrFail($id)->toArray();

        return $this->responseJson(['result'=>$auction]);
    }

    public function all(Request $request)
    {
        $channelid = $request->get("channelid", "");
        
        $auction = Auction::where("channelid", $channelid)->orderBy('id', 'desc')->lazy();

        return $this->responseJson($auction);
    }

    public function channels(Request $request)
    {
        $mode = $request->get('mode', '0');
        if ($mode != '0')
        {
            $channels = Channel::where('status', 1)->orderBy('id', 'desc')->pluck('channelid')->toArray();
            return implode("\n", $channels);
        }
   
        $channels = Channel::where('status', 1)->orderBy('id', 'desc')->lazy();
        return $this->responseJson(['result'=>$channels]);
    }
}