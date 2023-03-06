<?php

namespace App\Console\Commands\Agora;

use App\Jobs\Ecommerce\AuctionOrder;
use App\Models\Ecommerce\Auction as EcommerceAuction;
use App\Models\Ecommerce\AuctionCommodity;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Auction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agora:auction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process auction orders';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $auctions = AuctionCommodity::where('status', AuctionCommodity::STATUS_STARTED)->lazy();
        foreach ($auctions as $auc) {
            $start = new Carbon($auc->started_at);
            $end = $start->addSeconds($auc->duration);

            if ($end->lessThan(Carbon::now())) {
                $auc->status = AuctionCommodity::STATUS_STOPED;
                $auc->save();

                $this->info1("ID:{$auc->id}, Auction ID:{$auc->auction_id} Commodity:{$auc->commodity_id} Stoped.");

                AuctionOrder::dispatch($auc->id);

                $this->info1("Dispatch Job to process the orders. ID:".$auc->id);
            }
        }
        return 0;
    }

    private function error1($msg, $enterspace="\n")
    {
        $msg = date('Y/m/d H:i:s ') . "CMD auction error: " . $msg;
        echo $msg.$enterspace;
        Log::channel('auction')->error($msg);
    }

    private function info1($msg, $enterspace="\n")
    {
        $msg = date('Y/m/d H:i:s ')."CMD auction info: " . $msg;
        echo $msg.$enterspace;
        Log::channel('auction')->info($msg);
    }
}
