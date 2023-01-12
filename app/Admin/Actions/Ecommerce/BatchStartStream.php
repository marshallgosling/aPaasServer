<?php

namespace App\Admin\Actions\Ecommerce;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Ecommerce\RoomCommand;
use App\Jobs\Ecommerce\RoomAutoStream;

class BatchStartStream extends BatchAction
{
    public $name = 'Batch Start';

    public function handle(Collection $collection)
    {
        foreach ($collection as $model) {
            if ($model->status == RoomCommand::STATUS_STOPED) {
                RoomAutoStream::dispatch($model->id);
                $model->status = RoomCommand::STATUS_RUNNING;
                $model->save();
            }
        }

        return $this->response()->success('Batch starting streaming successfully.')->refresh();
    }

}