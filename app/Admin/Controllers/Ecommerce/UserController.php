<?php

namespace App\Admin\Controllers\Ecommerce;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        $grid->column('user_no', __('ID'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('role', __('Role'))->using(
            [User::ROLE_HOST=>'Host', User::ROLE_AUDIENCE=>'Audience']
        );
        $grid->column('verified', __('Verified'))->bool();
        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('user_no', 'ID');
            $filter->like('email', 'Email');
            $filter->like('phone', 'Phone');
            
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
        $show->field('user_no', __('UserNo'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('role', __('Role'));
        $show->field('verified', __('Verified'));
        $show->field('status', __('Status'));

        //$show->field('password', __('Password'));
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
        $form->text('user_no', __('UserNo'))->default(Str::random(16));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->password('password', __('Password'));
        $form->radio('role', __('Role'))->options(
            [User::ROLE_HOST=>'Host', User::ROLE_AUDIENCE=>'Audience']
        );
        $form->radio('status', __('Status'))->options(
            [User::STATUS_READY=>'Ready', User::STATUS_CLOSE=>'Closed']
        );
        $form->switch('verified', __('Verified'));

        $form->submitted(function (Form $form) {
            $pwd = request()->get('password');
            $form->password = Hash::make($pwd);
        });


        return $form;
    }
}
