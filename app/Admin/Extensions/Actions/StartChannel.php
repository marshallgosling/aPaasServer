<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;
use App\Models\Channel;

class StartChannel extends RowAction
{
    public $name = 'Start';

    public function handle(Channel $model)
    {
        return $model->start() ?
        $this->response()->success('Update succeed.')->refresh() :
        $this->response()->error('Update failed.')->refresh();
    }

}
