<?php

namespace App\Admin\Controllers\Ecommerce;

use App\Models\Ecommerce\Auction;
use App\Models\Ecommerce\Commodity;
use App\Models\Ecommerce\AuctionBid;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AuctionBidController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Auction Bids';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AuctionBid(), function ($model) {
            return $model->with(['auction:id,name','commodity:id,name','user:id,user_no']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('Id'));
        $grid->column('auction', __('Auction'))->display(function () {
            return $this->auction->name;
        });
        $grid->column('commodity', __('Commodity'))->display(function () {
            return $this->commodity->name;
        });
        $grid->column('account', __('Account'))->display(function () {
            return '<a href="users?user_no='.$this->user->user_no.'">'.$this->user->user_no.'('.$this->user_id.')</a>';
        });
        
        $grid->column('amount', __('Price'))->display(function () {
            return $this->currency . ' ' . $this->price;
        });
        $grid->column('status', __('Status'))->using([0=>'Pending', 1=>'Succuss', 2=>'Sorry', 9=>'Closed'])
            ->label([
                0 => 'default',
                2 => 'warning',
                1 => 'success',
                9 => 'danger',
            ]);
        $grid->column('created_at', __('Created at'));

        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
        
            // 在这里添加字段过滤器
            $filter->equal('auction_id', 'Auction')->select(Auction::pluck('name', 'id')->toArray());
            $filter->equal('commodity_id', 'Commodity')->select(Commodity::pluck('name', 'id')->toArray());
            $filter->equal('user_id', 'Account');
        
        });

        $grid->disableCreateButton();
        $grid->disableBatchActions();
        
        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
            $actions->disableEdit();
            //$actions->disableDelete();
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
        $show = new Show(AuctionBid::findOrFail($id));

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
        $form = new Form(new AuctionBid());

        // $form->number('auction_id', __('Auction id'));
        // $form->text('uid', __('Uid'));
        // $form->number('amount', __('Amount'))->default(1);
        // $form->number('status', __('Status'));

        return $form;
    }
}
