<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Utilities\RtcTokenBuilder2;
use App\Utilities\RtmTokenBuilder2;
use App\Models\Auction;

class agoratoken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agora:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Agora Token';

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
        $arr = Auction::pluck('name', 'id')->toArray();
        print_r($arr);
        return 0;
        
        $channelname = "test";
        $uid = 1;
        echo RtcTokenBuilder2::buildTokenWithUid(
            config("app.appid"), config("app.appcert"), $channelname, $uid, "", 86400, 86400
        );
        echo PHP_EOL;
        return 0;
    }
}
