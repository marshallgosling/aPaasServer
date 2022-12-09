<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Auction;
use App\Admin\Extensions\Actions\StopAuction;
use App\Admin\Extensions\Tools\SyncAuction;
use App\Models\Channel;

class AuctionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Auctions';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Auction, function ($model) {
            return $model->with(['Bid:id,uid,amount,status,created_at']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'))->expand(function ($model) {
            $bids = $model->bids()->where('status', 1)->orderBy('id', 'desc')->take(10)->get()->map(function ($bid) {
                return $bid->only(['id', 'uid', 'amount', 'created_at']);
            });

            return new Table(['ID', 'uid', 'bid amount', 'created_at'], $bids->toArray());
        });
        $grid->column('cover', __('Cover'))->image("/storage/", 160, 100);
        $grid->column('channelid', __('ChannelID'));
        $grid->column('amount', __('Amount'));
        $grid->column('status', __('STatus'))->using(
            [
                Auction::STATUS_SYNCING => 'Syncing',
                Auction::STATUS_READY  => 'Ready',
                Auction::STATUS_STOPED => 'Stoped'
            ]
        );
        $grid->column('last_bid_at', __('Last bid at'))->display(function () {
            return "<a href='".url("/admin/bid?auction_id=".$this->id)."'>".$this->last_bid_at."</a>";
        });
        $grid->column('start_at', __('start at'));
        $grid->column('end_at', __('End at'));

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('ID', 'ID');
            $filter->like('name', 'Name');
            $filter->in('channelid', 'ChannelID')->checkbox(
                Channel::where('status', Channel::STATUS_ONLINE)->pluck('channelid')->toArray()
            );
        });

        $grid->actions(function ($actions) {
            $actions->add(new StopAuction);
        });

        $grid->tools(function ($tools) {
            $tools->append(new SyncAuction());
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
        $show = new Show(Auction::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('code', __('Code'));
        $show->field('cover', __('Cover'))->image('/storage/', 200, 160);
        $show->field('owner', __('Owner'));
        $show->field('status', __('Status'))->using(['Pending', 'Online', 'Offline']);
        $show->field('duration', __('Duration'));
        $show->field('channelid', __('Channelid'));
        $show->field('base_amount', __('Base amount'));
        $show->field('amount', __('Amount'));
        $show->field('last_bid', __('Last bid'));
        $show->field('start_at', __('Start at'));
        $show->field('end_at', __('End at'));
        $show->field('last_bid_at', __('Last bid at'));
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
        $form = new Form(new Auction);

        $form->display('id', __('ID'));
        $form->text('name', __('Name'));
        $form->text('code', __('Code'));
        $form->image('cover', __("Cover"));
        $form->select('channelid', __('Channel ID'))->options(
            Channel::where('status', Channel::STATUS_ONLINE)->pluck('channelid', 'channelid')->toArray()
        );
        $form->text('base_amount', __('Base Amount'));
        $form->text('amount', __('Amount'));
        $form->text('owner', __('Owner'))->default('admin');
        $form->date('start_at', __('Start At'));
        $form->date('end_at', __('End At'));

        return $form;
    }
}
