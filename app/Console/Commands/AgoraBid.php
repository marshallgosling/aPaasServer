<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Bid;
use App\Models\Auction;

class AgoraBid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agora:bid {--channelId=?} {--mode=?} {--bid=?} {--amount=?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage bid demo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mode = $this->option('mode');
        if ($mode == 'create') {
            $channelid = $this->option('channelId');
        
            $name = "bid test";
            $code = Str::random(5);
            $channelid ?? Str::random(8);
            $amount = "100";
            $duration = 500;
            $status = 1;
    
            $id = Auction::create(compact(['name', 'code', 'channelid', 'amount', 'duration', 'status']));
            Log::info("create Auction -> id:".$id);
            $this->info("create Auction -> id:".$id);
        }

        if ($mode == 'bids') {
            $auction_id = $this->option('bid');
            $amount = $this->option('amount');
            $auction = Auction::find($auction_id);

            if(!$auction) return 0;

            $uid = Str::random(5);
            $amount ?? 104;
            $status = 1;

            $bid = Bid::create(compact(['auction_id','uid','amount','status']));
            Log::info("create one bid -> uid:{$uid} {$amount}");
            $this->info("create one bid -> uid:{$uid} {$amount}");
            $auction->last_bid_at = time();
            $auction->last_bid = $bid;
            $auction->save();
        }
        
        return 0;
    }
}
