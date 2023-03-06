<?php

namespace App\Jobs\Ecommerce;

use App\Models\Ecommerce\AuctionCommodity;
use App\Models\Ecommerce\Commodity;
use App\Models\Ecommerce\Order;
use App\Models\Ecommerce\OrderCommodity;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class AuctionOrder implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $failOnTimeout = false;

    public $uniqueFor = 3600;
    private $id;
    private $model;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }


    public function uniqueId()
    {
        return "AuctionOrder-".$this->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $auction = AuctionCommodity::find($this->id);
        if (!$auction) {
            $this->error("Auction does not exist.");
            return 0;
        }

        $lastBid = $auction->lastBid();

        
        if ($lastBid) {
            $auction_id = $auction->auction_id;
            $commodity_id = $auction->commodity_id;
            $user_id = $lastBid->user_id;
            $address_id = 0;
            $total_price = $lastBid->price;
            $currency = $lastBid->currency;
            $status = Order::STATUS_INCART;
            $order_no = date('A1YmdHis').random_int(10000, 99999);

            $order = Order::create(compact(['auction_id','order_no','user_id','total_price','currency','currency','status']));

            $this->info("Order data: ".json_encode(compact(['auction_id','order_no','user_id','total_price','currency','currency','status'])));
            $com = Commodity::find($commodity_id);
            if ($order && $com) {

                $this->info("Create order success. id:". $order->id." order_no:".$order_no);
                $commodity = $com->name;
                $price = $lastBid->price;
                $amount = 1;
                OrderCommodity::create(compact(['order_id', 'commodity_id', 'commodity', 'price', 'amount']));
            }
            else {
                $reason = '';
                if (!$com) $reason = 'commodity not exists'.
                $this->error("Create order failed. reason: " . $reason);
            }
        }

    }

    private function error($msg, $enterspace="\n")
    {
        $msg = date('Y/m/d H:i:s ') . "CMD ".$this->id. " error: " . $msg;
        echo $msg.$enterspace;
        Log::channel('auction')->error($msg);
    }

    private function info($msg, $enterspace="\n")
    {
        $msg = date('Y/m/d H:i:s ')."CMD ".$this->id. " info: " . $msg;
        echo $msg.$enterspace;
        Log::channel('auction')->info($msg);
    }

    /**
     * Get the cache driver for the unique job lock.
     *
     * @return \Illuminate\Contracts\Cache\Repository
     */
    public function uniqueVia()
    {
        return Cache::driver('redis');
    }
}
