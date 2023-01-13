<?php

namespace App\Admin\Controllers\Ecommerce;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\Address;
use App\Models\Ecommerce\User;
use Illuminate\Support\Str;

class AddressController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Address';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Address, function ($model) {
            return $model->with(['user']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('user', __('Account'))->display(function () {
            return '<a href="users?user_no='.$this->user->user_no.'">'.$this->user->user_no.'</a>';
        });
        $grid->column('address', __('ChannelId'));
        $grid->column('post_code', __('roomNo'));


        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('id', 'ID');
            $filter->like('name', 'Name');
            
        });

        $grid->actions(function ($actions) {
            //$actions->add(new RoomCommands);
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
        $show = new Show(Address::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('province_id', __('Province'));
        $show->field('city_id', __('City'));
        $show->field('district_id', __('District'));
        $show->field('user_id', __('Owner'));
        $show->field('address', __('Address'));
        
        $show->field('post_code', __('Post Code'));
        $show->field('contactor', __('Contact'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Address);

        $form->display('id', __('ID'));
        $form->text('name', __('Name'));
        $form->distpicker(['province_id' => 'Province', 'city_id' => 'City', 'district_id' => 'District'], "Area");
        $form->select('user_id', __('Owner'))->options(
            User::pluck("email", 'id')->toArray()
        );
        $form->text('address', __('Address'));
        $form->text('post_code', __('Post Code'));

        return $form;
    }
}
