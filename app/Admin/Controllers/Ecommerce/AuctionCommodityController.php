<?php

namespace App\Admin\Controllers\Ecommerce;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\Auction;
use Carbon\CarbonInterval;
use App\Admin\Actions\Ecommerce\StartAuction;
use App\Models\Ecommerce\AuctionCommodity;
use App\Models\Ecommerce\Commodity;

class AuctionCommodityController extends AdminController
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
        $grid = new Grid(new AuctionCommodity(), function ($model) {
            return $model->with(['auction', 'commodity']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('auction', __('Auction'))->display(function () {
            return '<a href="../auction?id='.$this->auction->id.'">'.$this->auction->name.'</a>';
        });
        $grid->column('commodity', __('Commodity'))->display(function () {
            return '<a href="../commodity?id='.$this->id.'">'.$this->commodity->name.'</a>';
        });

        $grid->column('duration', __('Duration'))->display(function () {
            return CarbonInterval::seconds($this->duration)->cascade()->forHumans();
        });

        $grid->column('floor_price', __('Base Price'));
        $grid->column('ceiling_price', __('Ceiling Price'));
        $grid->column('price_step', __('Minimun Bid'));

        $grid->column('created_at', __('start at'));
        
        $grid->column('status', __('Status'))->using(
            [
                AuctionCommodity::STATUS_READY => 'Ready',
                AuctionCommodity::STATUS_STARTED  => 'Started',
                AuctionCommodity::STATUS_STOPED => 'Stoped'
            ]
        );

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
        
            $filter->equal('auction_id', 'Auction')->select(
                Auction::pluck('name', 'id')->toArray()
            );
        });

        $grid->actions(function ($actions) {
            $actions->add(new StartAuction);
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
        $show = new Show(AuctionCommodity::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('auction_id', __('Auction ID'));
        $show->field('commodity_id', __('Commodity ID'));
        $show->field('duration', __('Duration'));
        $show->field('amount', __('Amount'));
        $show->field('floor_price', __('Base Price'));
        $show->field('ceiling_price', __('Base Price'));
        $show->field('price_step', __('Minimun Bid'));
        $show->field('status', __('Status'))->using(
            [
                AuctionCommodity::STATUS_READY => 'Ready',
                AuctionCommodity::STATUS_STARTED  => 'Started',
                AuctionCommodity::STATUS_STOPED => 'Stoped'
            ]
        );

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new AuctionCommodity);

        $form->display('id', __('ID'));

        $form->select('auction_id', __('Auction'))->options(
            Auction::pluck('name', 'id')->toArray()
        );
        $form->select('commodity_id', __('Commodity'))->options(
            Commodity::pluck("name", "id")->toArray()
        );

        $form->text('duration', __('Duration'));

        $form->text('amount', __('Amount'));
        $form->text('floor_price', __('Base Price'));
        $form->text('ceiling_price', __('Ceiling Price'));
        $form->text('price_step', __('Minimun Bid'));

        $form->radio('status', __('Status'))->options(
            [
                AuctionCommodity::STATUS_READY => 'Ready',
                AuctionCommodity::STATUS_STARTED  => 'Started',
                AuctionCommodity::STATUS_STOPED => 'Stoped'
            ]
        );
        
        return $form;
    }
}