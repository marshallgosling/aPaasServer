<?php

namespace App\Admin\Extensions\Actions\Ecommerce;

use Encore\Admin\Actions\RowAction;
use App\Models\Ecommerce\RoomCommand;

class StartCommand extends RowAction
{
    public $name = 'Start';

    public function handle(RoomCommand $model)
    {
        if ($model->status == RoomCommand::STATUS_STOPED) {
            dispatch(new StartCommand($model->id));
            $model->status = RoomCommand::STATUS_RUNNING;
            $model->save();

            $this->response()->success('Start running job succeed.')->refresh();
        }
        else if ($model->status == RoomCommand::STATUS_RUNNING) {
            $this->response()->error('The job is running.')->refresh();
        }
        else {
            $this->response()->error('The job is closed. Please manually change the state.')->refresh();
        }
        
        
    }

}
