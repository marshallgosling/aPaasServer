<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Utilities\RtcTokenBuilder2;
use App\Utilities\RtmTokenBuilder2;
use App\Models\Auction;
use Illuminate\Support\Facades\Redis;

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
        $key = 'RoomSong-demo123';

        $list = Redis::lrange($key, 0, 10);

        foreach($list as $l)
        {
            echo " ------------------------------------------------\n";
            echo $l."\n";
            echo base64_decode($l)."\n\n";
        }
        echo " sample ------------------------------------------------\n";
        $sample = "eyJzb25nX25vIjoiNjI0NjI2MjcyNzI4MTg3MCIsInNvbmdfbmFtZSI6Ilx1NWM0Ylx1OTg3NiIsInNvbmdfdXJsIjoiaHR0cHM6XC9cL2FjY2t0di5zZC1ydG4uY29tXC8yMDIyMDcxOTE0NDBcLzI1OGYxMjI3MzU2YmQxNDZmYTJkOTM3ZjJmZDVmYWE1XC9yZWxlYXNlXC8xXC8zZVwvbXAzXC83MFwvQ2htRkdscHpUYUNBT2x1OEFFM0xHbUpqQlI0NjcwLm1wMyIsImltYWdlX3VybCI6Imh0dHBzOlwvXC9hY2NwaWMuc2QtcnRuLmNvbVwvcGljXC9yZWxlYXNlXC9qcGdcLzFcLzJkMWFlZFwvQ2htRloxUzBpbW1BVnRTREFBT0RWUnpNTkhnNDU0LmpwZyIsInNpbmdlciI6Ilx1NTQ2OFx1Njc3MFx1NGYyNixcdTZlMjlcdTVjOWEiLCJseXJpYyI6Imh0dHBzOlwvXC9hY2NrdHYuc2QtcnRuLmNvbVwvMjAyMjA3MjAxNDAyXC82NzFlOTAyMGNlMTFmMTQ0YmY1Yzc5NDE3MjlhNjYwOVwvcmVsZWFzZVwvbHlyaWNcL3ppcF91dGY4XC8xXC80NTczMzEzOTQ4NDQ0ODhiYmQ5NGUwYzhmYzc4NGY3Yy56aXAiLCJzb3J0IjoiMiIsInVzZXJfbm8iOiIifQ==\n";
        echo $sample."\n";
        echo base64_decode($sample);
        exit;
        
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
