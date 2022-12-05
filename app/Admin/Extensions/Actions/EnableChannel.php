<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;
use App\Models\Channel;

class EnableChannel extends RowAction
{
    public $name = 'Enable';

    public function handle(Channel $model)
    {
        return $model->enable() ?
        $this->response()->success('Update succeed.')->refresh() :
        $this->response()->error('Update failed.')->refresh();
    }

}
