<?php
namespace App\Admin\Actions\Ecommerce;

use Encore\Admin\Actions\RowAction;
use App\Models\Ecommerce\AuctionCommodity;

class StartAuction extends RowAction
{
    public $name = 'Start';

    public function handle(AuctionCommodity $model)
    {
        $result = $model->sync(AuctionCommodity::STATUS_STARTED);
        return $result ? $this->response()->success('Update succeed.')->refresh() :
            $this->response()->error("Start failed")->refresh();
    }
}
