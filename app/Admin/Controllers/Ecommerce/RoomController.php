<?php

namespace App\Admin\Controllers\Ecommerce;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\Room;
use Illuminate\Support\Str;

class RoomController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Rooms';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Room, function ($model) {
            return $model->with(['users']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('cover_image', __('Image'));
        $grid->column('user_id', __('user_id'));
        $grid->column('channel_id', __('Channel'));
        $grid->column('room_no', __('roomNo'));
        
        $grid->column('status', __('Status'))->using(
            [
                Room::STATUS_READY  => 'Ready',
                Room::STATUS_CLOSE => 'Closed'
            ]
        );
        $grid->column('start_datetime', __('Start at'));
        $grid->column('end_datetime', __('End at'));
        
        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('ID', 'ID');
            $filter->like('name', 'Name');
            
        });

        $grid->actions(function ($actions) {
            //$actions->add(new StopAuction);
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
        $show = new Show(Room::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('channel_id', __('Channel ID'));
        $show->field('room_no', __('Room ID'));
        $show->field('cover_image', __('Icon'))->image('/storage/');
        $show->field('user_id', __('Owner'));
        $show->field('status', __('Status'));
        
        $show->field('start_datetime', __('Start at'));
        $show->field('end_datetime', __('End at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Room);

        $form->display('id', __('ID'));
        $form->text('name', __('Name'));
        $form->text('channel_id', __('Channel ID'))->default(Str::random(16));
        $form->text('room_no', __('Room ID'))->default(Str::random(16));
        $form->image('cover_image', __("Icon"));
        $form->text('user_id', __('Owner'));
        $form->text('status', __('Status'));
        $form->date('start_datetime', __('Start at'));
        $form->date('end_datetime', __('End at'));

        return $form;
    }
}
