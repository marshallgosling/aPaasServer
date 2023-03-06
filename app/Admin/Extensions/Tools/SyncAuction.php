<?php
namespace App\Admin\Extensions\Tools;

use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Channel;
use Illuminate\Support\Facades\Redis;

class SyncAuction extends Action
{
    protected $selector = '.scan';
    public $name = 'Sync Auction Metadata';

    public function handle(Request $request)
    {
        $channelid = $request->post("channelid");
        $channel = Channel::find($channelid);
        $res = false;
        if ($channel) {
            $res = $channel->sync();
        }
        return $res ? $this->response()->success('Sync Metadata Success.') :
        $this->response()->error('Sync Metadata Failed.');
    }

    public function form()
    {

        $this->select('commodity', 'Commodity')->options(
            Channel::where("status", Channel::STATUS_ONLINE)->pluck("channelid", "id")->toArray()
        );

    }

    public function html()
    {
        return '<a class="btn btn-sm btn-danger scan"><i class="fa fa-info-circle"></i> Sync Auction</a>';
    }
}
