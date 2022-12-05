<?php

namespace App\Jobs;

use App\Models\Bid;
use App\Models\BidDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class BidJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $json;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($json)
    {
        $this->json = $json;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug(json_encode($this->json));
        $uid = $this->json['uid'];
        $amount = $this->json['amount'];
        $bid_id = $this->json['bid'];
        $status = 0;
        $bidAction = $this->logBid(compact(['bid_id','uid','amount','status']));
   
        $bidAuction = Bid::find($bid_id);
        
        if(!$bidAuction || $bidAuction->status != 1) {
            $bidAction->status = BidDetail::STATUS_CLOSE;
            $bidAction->save();
            Log::info("bid is closed: {$bid_id} {$uid} {$amount}");
            return 0;
        }

        $lastbid = $bidAuction->lastBid($bid_id);

        $valid = false;

        if(!$lastbid)
        {
            $valid = true;
        }
        else {
            if($lastbid->amount < $amount && $lastbid->uid != $uid)
            {
                $valid = true;
            }
        }

        Log::info("Bid: {$bid_id} Uid:{$uid} is {$valid}");
        if($valid) {
            $bidAction->status = BidDetail::STATUS_VALID;
            $bidAction->save();
            $bidAuction->last_bid = $bidAction->id;
            $bidAuction->last_bid_at = $bidAction->created_at;
            $bidAuction->save();
            Log::info("Save last valid bid: {$bid_id} {$uid} {$bidAction->created_at} {$amount}");
        }
        else {
            $bidAction->status = BidDetail::STATUS_SORRY;
            $bidAction->save();
            Log::info("Save invalid bid: {$bid_id} {$uid} {$amount}");
        }
        return 0;
    }

    private function logBid($data)
    {
        return BidDetail::create($data);
    }

    public function failed()
    {
        Log::error("failed queue. Name:".$this->json['name']);
    }
}
