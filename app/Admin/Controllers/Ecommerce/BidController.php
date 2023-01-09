<?php

namespace App\Admin\Controllers\Ecommerce;

use App\Models\Auction;
use App\Models\Bid;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BidController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Bids';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Bid(), function ($model) {
            return $model->with(['auction:id,name']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('Id'));
        $grid->column('auction', __('Auction'))->display(function () {
            return $this->auction->name;
        });
        $grid->column('uid', __('Uid'));
        $grid->column('amount', __('Amount'));
        $grid->column('status', __('Status'))->using([0=>'Pending', 1=>'Succuss', 2=>'Sorry', 9=>'Closed'])
            ->label([
                0 => 'default',
                2 => 'warning',
                1 => 'success',
                9 => 'danger',
            ]);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
        
            // 在这里添加字段过滤器
            $filter->equal('auction_id', 'Auction')->select(Auction::pluck('name', 'id')->toArray());
        
        });
        

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Bid::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('auction_id', __('Auction id'));
        $show->field('uid', __('Uid'));
        $show->field('amount', __('Amount'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Bid());

        $form->number('auction_id', __('Auction id'));
        $form->text('uid', __('Uid'));
        $form->number('amount', __('Amount'))->default(1);
        $form->number('status', __('Status'));

        return $form;
    }
}
