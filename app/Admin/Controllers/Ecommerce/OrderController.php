<?php

namespace App\Admin\Controllers\Ecommerce;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\Order;

use App\Models\Ecommerce\User;
use App\Admin\Extensions\Tools\SyncAuction;
use App\Models\Ecommerce\Auction;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Orders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order, function ($model) {
            return $model->with(['auction', 'user']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('order_no', __('Order No.'));

        $grid->column('total_price', __("Total Price"));

        $grid->column('auction', __('Auction'))->display(function () {
            return '<a href="auction?ID='.$this->auction->id.'">'.$this->auction->name.'</a>';
        });

        $grid->column('user', __('Owner'))->display(function () {
            return $this->user->user_no;
        });

        $grid->column('commodities', __('Commodities'))->expand(function ($model) {
            $items = $model->commodity()->orderBy('id', 'asc')->take(20)->get()->map(function ($item) {
                return $item->only(['id', 'commodity.name', 'amount', 'price']);
            });

            return new Table(['ID', 'Name', 'Amount', 'Price'], $items->toArray());
        });


        $grid->column('status', __('Status'))->using(
            [
                Order::STATUS_INCART => 'Incart',
                Order::STATUS_UNPAID  => 'Unpaid',
                Order::STATUS_PAID => 'Paid',
                Order::STATUS_FINISHED => 'Finished',
                Order::STATUS_REFUND => 'Refund',
                Order::STATUS_CANCELED => 'Canceled',
                Order::STATUS_PAID_ERROR => 'Error'
            ]
        );
        


        $grid->column('created_at', __('start at'));


        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->like('order_no', 'Order No.');
            $filter->like('user_id', 'User');
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_no', __('Name'));
        $show->field('total_price', __('Total Price'));
        $show->field('auction_id', __('Auction ID'));
        $show->field('user_id', __('Account'));
        $show->field('address_id', __('Address ID'));
        $show->field('status', __('Status'))->using(
            [
                Order::STATUS_INCART => 'Incart',
                Order::STATUS_UNPAID  => 'Unpaid',
                Order::STATUS_PAID => 'Paid',
                Order::STATUS_FINISHED => 'Finished',
                Order::STATUS_REFUND => 'Refund',
                Order::STATUS_CANCELED => 'Canceled',
                Order::STATUS_PAID_ERROR => 'Error'
            ]
        );
        
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
        $form = new Form(new Order);

        $form->display('id', __('ID'));
        $form->text('order_no', __('Order No'));
        $form->text('total_price', __('Total Price'));
        $form->select('auction_id', __('Auction'))->options(
            Auction::pluck('name', 'id')->toArray()
        );
        $form->select('user_id', __('Account'))->options(
            User::pluck("email", "id")->toArray()
        );

        $form->radio('status', __("Status"))->options(
            [
                Order::STATUS_INCART => 'Incart',
                Order::STATUS_UNPAID  => 'Unpaid',
                Order::STATUS_PAID => 'Paid',
                Order::STATUS_FINISHED => 'Finished',
                Order::STATUS_REFUND => 'Refund',
                Order::STATUS_CANCELED => 'Canceled',
                Order::STATUS_PAID_ERROR => 'Error'
            ]
        );

        return $form;
    }
}