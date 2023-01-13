<?php

namespace App\Admin\Controllers\Ecommerce;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\Auction;

use App\Models\Ecommerce\User;
use App\Admin\Extensions\Tools\SyncAuction;
use App\Models\Ecommerce\OrderCommodity;
use App\Models\Ecommerce\Commodity;

class OrderCommodityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Auction Commodities';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderCommodity(), function ($model) {
            return $model->with(['order']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('order', __('Order'))->display(function () {
            return $this->order->order_no;
        });
        $grid->column('commodity', __('Commodity'))->display(function () {
            return '<a href="commodity?id='.$this->id.'">'.$this->commodity->name.'</a>';
        });

        $grid->column('bids', __('Bid Logs'))->expand(function ($model) {
            $bids = $model->bids()->where('status', 1)->orderBy('id', 'desc')->take(10)->get()->map(function ($bid) {
                return $bid->only(['id', 'uid', 'amount', 'created_at']);
            });

            return new Table(['ID', 'uid', 'bid amount', 'created_at'], $bids->toArray());
        });

        $grid->column('amount', __('Amount'));
        $grid->column('floor_price', __('Base Price'));
        $grid->column('ceiling_price', __('Ceiling Price'));
        $grid->column('price_step', __('Minimun Bid'));

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
        
            $filter->equal('auction_id', 'Auction')->select(
                Auction::pluck('name', 'id')->toArray()
            );
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
        $show = new Show(OrderCommodity::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('auction_id', __('Auction ID'));
        $show->field('commodity_id', __('Commodity ID'));
        $show->field('amount', __('Amount'));
        $show->field('floor_price', __('Base Price'));
        $show->field('ceiling_price', __('Base Price'));
        $show->field('price_step', __('Minimun Bid'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderCommodity);

        $form->display('id', __('ID'));

        $form->select('auction_id', __('Auction'))->options(
            Auction::pluck('name', 'id')->toArray()
        );
        $form->select('commodity_id', __('Commodity'))->options(
            Commodity::pluck("name", "id")->toArray()
        );

        $form->text('amount', __('Amount'));
        $form->text('floor_price', __('Base Price'));
        $form->text('ceiling_price', __('Ceiling Price'));
        $form->text('price_step', __('Minimun Bid'));
        
        return $form;
    }
}