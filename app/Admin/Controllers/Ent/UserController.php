<?php

namespace App\Admin\Controllers\Ent;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Room;
use App\Models\User;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Users';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('headUrl', __('Icon'))->image("/storage/", 100, 100);
        $grid->column('name', __('Name'));
        $grid->column('userNo', __('UserNo'));
        $grid->column('mobile', __('Mobile'));
        $grid->column('sex', __('Sex'));

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('ID', 'ID');
            $filter->like('name', 'Name');
            $filter->like('mobile', 'Mobile');
            $filter->like('userNo', 'UserNo');
            
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('headUrl', __('Icon'))->image('/storage/', 200, 160);
        $show->field('mobile', __('Mobile'));
        $show->field('userNo', __('Owner'));
        $show->field('sex', __('Sex'));
        $show->field('status', __('Status'));
        
        $show->field('email', __('Email'));
        $show->field('password', __('Password'));
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
        $form = new Form(new User);

        $form->display('id', __('ID'));
        $form->text('name', __('Name'));
        $form->text('email', __('Email'));
        $form->text('mobile', __('Mobile'));
        $form->text('password', __('Password'));
        $form->image('headUrl', __("Icon"));
        $form->text('userNo', __('Owner'));
        $form->text('status', __('Status'));
        $form->text('sex', __('Sex'));

        return $form;
    }
}
