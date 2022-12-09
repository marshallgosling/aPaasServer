<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;
use App\Models\Auction;

class EnableAuction extends RowAction
{
    public $name = 'Enable';

    public function handle(Auction $model)
    {
        $model->enable();
        return $this->response()->success('Update succeed.')->refresh();
    }

}
