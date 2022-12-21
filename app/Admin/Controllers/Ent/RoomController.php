<?php

namespace App\Admin\Controllers\Ent;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Room;
use App\Models\User;

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
        $grid->column('icon', __('Icon'));
        $grid->column('roomNo', __('roomNo'));
        $grid->column('createNo', __('Owner'));
        $grid->column('status', __('Status'))->using(
            [
                Room::STATUS_READY  => 'Ready',
                Room::STATUS_CLOSE => 'Closed'
            ]
        );
        $grid->column('roomPeopleNum', __('Peoples'));
        $grid->column('created_at', __('Created at'));
        
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
        $show->field('roomNo', __('Room No'));
        $show->field('icon', __('Icon'));
        $show->field('createNo', __('Owner'));
        $show->field('status', __('Status'));
        $show->field('roomPeopleNum', __('Peoples'));
        
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

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
        $form->text('roomNo', __('Code'));
        $form->text('icon', __("Icon"));
        $form->text('createNo', __('Owner'));
        $form->text('status', __('Status'));
        $form->text('roomPeopleNum', __('People'));

        return $form;
    }
}
