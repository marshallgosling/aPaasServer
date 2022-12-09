<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;
use App\Models\Channel;

class StopChannel extends RowAction
{
    public $name = 'Stop';

    public function handle(Channel $model)
    {
        return $model->stop() ?
        $this->response()->success('Update succeed.')->refresh() :
        $this->response()->error('Update failed.')->refresh();
    }

}
