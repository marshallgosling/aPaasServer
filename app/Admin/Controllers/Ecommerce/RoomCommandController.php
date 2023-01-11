<?php

namespace App\Admin\Controllers\Ecommerce;

use App\Admin\Extensions\Actions\Ecommerce\StartCommand;
use App\Admin\Renders\ShowLogs;
use App\Models\Ecommerce\Room;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Box;
use App\Models\Ecommerce\RoomCommand;
use App\Models\Ecommerce\User;
use Illuminate\Support\MessageBag;

class RoomCommandController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Room Streams';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RoomCommand, function ($model) {
            return $model->with(['room']);
        });

        $grid->model()->orderBy('id', 'desc');

        //$grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('room', __('Room'))->display(function () {
            return '<a href="rooms?id='.$this->room->id.'">'.$this->room->name.'</a>';
        });
        $grid->column('command', __('Command'))->display(function () {
            return "Json Config";
        })->expand(function ($model) {
            return new Box('Json Config', view('admin.form.config', ['id'=>$model->id,'config'=>json_encode($model->data, JSON_UNESCAPED_UNICODE)]));
        });
        
        $grid->column('status', __('Status'))->using(
            [
                RoomCommand::STATUS_STOPED  => 'Stoped',
                RoomCommand::STATUS_RUNNING  => 'Running',
                RoomCommand::STATUS_CLOSE => 'Closed'
            ]
        );

        // $grid->column('logs', __('Log'))->display(function () {
        //     return "Logs";
        // })->modal('Running Logs', ShowLogs::class);
        
        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('room_id', 'Room')->select(
                Room::pluck('name', 'id')->toArray()
            );
            $filter->like('name', 'Name');
            
        });

        $grid->actions(function ($actions) {
            $actions->add(new StartCommand);
        });

        $grid->tools(function ($tools) {
            //$tools->append(new SyncAuction());
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(RoomCommand::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('room_id', __('Room ID'));
        $show->field('data', __('Config'))->json();
        $show->field('status', __('Status'));
        $show->field('log', __("Log"));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RoomCommand);

        $form->display('id', __('ID'));
        $form->text('name', __('Name'));
        $form->select('room_id', __('Room'))->options(
            Room::pluck("name", 'id')->toArray()
        );
        $form->textarea('data', 'Config');
        $form->radio('status', __('Status'))->options(
            [
                RoomCommand::STATUS_STOPED  => 'Stoped',
                RoomCommand::STATUS_RUNNING  => 'Running',
                RoomCommand::STATUS_CLOSE => 'Closed'
            ]
        );

        $form->submitted(function (Form $form) {
            $posted_data = request()->all();
            //$rule = DiscoverRuleModel::find($posted_data['discover_id']);
            $json = json_decode($posted_data['data']);
            
            if(!$json) {
                $error = new MessageBag([
                    'title'   => 'Json Parser Error',
                    'message' => 'Can not parse json data format.',
                ]);
            
                return back()->with(compact('error'));
            }
            else {
                $form->data = $json;
            }
            
        });

        
        return $form;
    }
}
