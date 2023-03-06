<?php

namespace App\Admin\Controllers\Ecommerce;

use App\Admin\Actions\Ecommerce\StartAuction;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\Auction;

use App\Models\Ecommerce\User;
use App\Models\Ecommerce\Room;
use Carbon\CarbonInterval;

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
            return $model->with(['room', 'user']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('room', __('Room'))->display(function () {
            return '<a href="rooms?ID='.$this->room->id.'">'.$this->room->name.'</a>';
        });

        $grid->column('user', __('Owner'))->display(function () {
            return '<a href="users?user_no='.$this->user->user_no.'">'.$this->user->user_no.'('.$this->user_id.')</a>';
        });

        $grid->column('commodities', __('Commodities'))->display(function () {
            return '<a href="auction/commodity?auction_id='.$this->id.'">Manage Commodities</a>';
        });

        $grid->column('bids', __('Bids'))->display(function () {
            return '<a href="auction/bid?auction_id='.$this->id.'">View Bids</a>';
        });

        $grid->column('status', __('Status'))->using(
            [
                Auction::STATUS_READY => 'Ready',
                Auction::STATUS_SYNCING  => 'Syncing',
                Auction::STATUS_STOPED => 'Stoped'
            ]
        );
        
        $grid->column('created_at', __('start at'));


        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('id', 'ID');
            $filter->like('name', 'Name');
            $filter->equal('room_id', 'Room')->select(
                Room::pluck('name', 'id')->toArray()
            );
        });

        $grid->actions(function ($actions) {
            //$actions->add(new StartAuction);
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
        $show = new Show(Auction::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('room_id', __('Room ID'));
        $show->field('owner_id', __('Owner'));
        $show->field('status', __('Status'))->using([
            Auction::STATUS_READY => 'Ready',
            Auction::STATUS_SYNCING  => 'Syncing',
            Auction::STATUS_STOPED => 'Stoped'
        ]);
        
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
        $form->text('description', __('Description'));
        
        $form->select('room_id', __('Room'))->options(
            Room::pluck('name', 'id')->toArray()
        );
        $form->select('owner_id', __('Owner'))->options(
            User::pluck("email", "id")->toArray()
        );

        $form->radio('status', __("Status"))->options(
            [
                Auction::STATUS_READY => 'Ready',
                Auction::STATUS_SYNCING  => 'Syncing',
                Auction::STATUS_STOPED => 'Stoped'
            ]
        );

        return $form;
    }
}