<?php

namespace App\Admin\Controllers\Ecommerce;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\User;
use App\Models\Ecommerce\Commodity;
use Illuminate\Support\Str;

class CommodityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Commodities';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Commodity, function ($model) {
            return $model->with(['user']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('currency', __('Currency'));
        $grid->column('price', __('Price'));
        $grid->column('user', __('Account'))->display(function () {
            return '<a href="users?user_no='.$this->user->user_no.'">'.$this->user->user_no.'</a>';
        });
        $grid->column('image', __('Images'))->display(function () {
            return '<a href="commodity/images?commodity_id='.$this->id.'">Manage Images</a>';
        });
        
        $grid->column('status', __('Status'))->using(
            [
                Commodity::STATUS_READY  => 'Ready',
                Commodity::STATUS_CLOSE => 'Closed'
            ]
        );
        $grid->column('created_at', __('Create at'));
        
        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('id', 'ID');
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
        $show = new Show(Commodity::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('currency', __('Currency'));
        $show->field('price', __('Price'));
        $show->field('description', __('Description'));
        $show->field('user_id', __('Owner'));
        $show->field('status', __('Status'));
        
        $show->field('created_at', __('Start at'));
        $show->field('updated_at', __('End at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Commodity);

        $form->display('id', __('ID'));
        $form->text('name', __('Name'));
        $form->radio('currency', __('currency'))->options(['$'=>'$','¥'=>'¥']);
        $form->text('price', __('Price'));
        $form->text('description', __('Description'));
        $form->select('user_id', __('Owner'))->options(
            User::pluck("email", 'id')->toArray()
        );
        $form->radio('status', __('Status'))->options(
            [Commodity::STATUS_READY=>'Ready', Commodity::STATUS_CLOSE=>'Closed']
        );

        return $form;
    }
}
