<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;
use App\Models\Channel;


class SyncChannel extends RowAction
{
    public $name = 'Sync';

    public function handle(Channel $model)
    {
        $res = $model->sync();
        return $res ?
            $this->response()->success('Sync succeed.') :
            $this->response()->error("Sync failed.");
    }

}
