<?php

namespace App\Admin\Extensions\Actions\Ecommerce;

use App\Jobs\Ecommerce\RoomAutoStream;
use Encore\Admin\Actions\RowAction;
use App\Models\Ecommerce\RoomCommand;

class StartCommand extends RowAction
{
    public $name = 'Start';

    public function handle(RoomCommand $model)
    {
        if ($model->status == RoomCommand::STATUS_STOPED) {
            RoomAutoStream::dispatch($model->id);
            $model->status = RoomCommand::STATUS_RUNNING;
            $model->save();

            return $this->response()->success('Start running job succeed.')->refresh();
        }
        if ($model->status == RoomCommand::STATUS_RUNNING) {
            return $this->response()->error('The job is running.')->refresh();
        }
        else {
            return $this->response()->error('The job is closed. Please manually change the state.')->refresh();
        }
        
        
    }

}
