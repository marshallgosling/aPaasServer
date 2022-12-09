<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;
use App\Models\Auction;

class StopAuction extends RowAction
{
    public $name = 'Stop';

    public function handle(Auction $model)
    {
        $model->stops();
        return $this->response()->success('Update succeed.')->refresh();
    }

}
