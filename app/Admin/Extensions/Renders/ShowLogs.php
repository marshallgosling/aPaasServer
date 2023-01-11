<?php

namespace App\Admin\Renders;

use Illuminate\Contracts\Support\Renderable;
use App\Models\Ecommerce\RoomCommand;
use Encore\Admin\Widgets\Box;

class ShowLogs implements Renderable
{
    public function render($id = null)
    {
        $model = RoomCommand::findOrFail($id);

        $box = new Box("", $model->log);
        
        echo $box->render();
    }
}
