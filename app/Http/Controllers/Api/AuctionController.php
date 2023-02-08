<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Jobs\BidJob;
use App\Models\Bid;
use App\Models\Auction;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class AuctionController extends ApiController {

    protected $json = true;

    public function bid(Request $request) {
        
        $uid = $request->json("uid", "uid");
        $amount = (int)$request->json("amount", 0);
        $auction_id = $request->json("id", "0");
        
        if ($auction_id == '0') {
            return $this->responseJson(['result'=>false, "reason"=>'auction id is null']);
        }

        // Queue
        //$bidjob = new BidJob(compact(['uid', 'channelid', 'amount', 'bid_id']));
        //$bidjob->dispatch();

        // MySQL
        $auction = Auction::find($auction_id);
        if ($auction) {
            if ($amount <= $auction->amount)
            {
                $result = ['result'=>false, 'reason'=>'Your bid amount must greater than '.$auction->amount.'.'];
            }
            else {

                $channelid = $auction->channelid;
    
                Log::info("User Bid: uid {$uid} channelid {$channelid} amount {$amount}");
    
                $result = $auction->processBid($auction_id, $uid, $amount);
            }
            
        } else {
            $result = ['result'=>false, 'reason'=>'Auction is not exists.'];
        }

        if ($result['result']) {
            $channel = Channel::where("channelid", $channelid)->first();
            if ($channel) {
                $channel->sync();
                $result = ['result'=>true, 'reason'=>'Your bid is accepted.'];
            }
            else {
                Log::info("Channel {$channelid} not exists.");
            }
        }

        return $this->responseJson($result);
    }

    public function sync(Request $request)
    {
        $id = $request->post("channelid", "0");
        $sync = $request->post("status", "0");
        Auction::where("channelid", $id)->update(['status'=>$sync]);
        Log::info("Set Auction status to Syncing with channelid:{$id}.");
        //DB::update(DB::raw("update auction set status=1 where channelid='$id'"));
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

        return $this->responseJson(["result"=>$auction]);
    }

    public function channel($channelid)
    {
        $channel = Channel::where("channelid", $channelid)->first();
        if ($channel && $channel->status == Channel::STATUS_ONLINE) {
            return "online";
        }
        else {
            return "offline";
        }
    }

    public function channels(Request $request)
    {
        $mode = $request->get('mode', '0');
        if ($mode != '0')
        {
            $channels = Channel::orderBy('id', 'desc')->pluck('channelid')->toArray();
            return implode("\n", $channels);
        }
   
        $channels = Channel::orderBy('id', 'desc')->lazy();
        return $this->responseJson(['result'=>$channels]);
    }
}