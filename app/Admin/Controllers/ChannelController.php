<?php

namespace App\Admin\Controllers;

use App\Models\Channel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Extensions\Actions\StartChannel;
use App\Admin\Extensions\Actions\StopChannel;
use App\Admin\Extensions\Actions\SyncChannel;

class ChannelController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Channel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Channel());

        $grid->column('id', __('Id'));
        $grid->column('channelid', __('Name'));
        $grid->column('appid', __('Code'));
        $grid->column('owner', __('Owner'));
        $grid->column('status', __('Status'))->bool(['1' => true, '0' => false, '2'=>false]);
        
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->actions(function ($actions) {
            $actions->add(new StartChannel);
            $actions->add(new StopChannel);
            //$actions->add(new SyncChannel);
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
        $show = new Show(Channel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('channelid', __('Name'));
        $show->field('appid', __('AppId'));
        $show->field('status', __('Status'))->using(['Pending', 'Online', 'Offline']);
        $show->field('owner', __('Owner'));
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
        $form = new Form(new Channel());
        $form->text('appid', __('AppId'));
        $form->text('channelid', __('ChannelId'));
        $form->text('owner', __('Owner'))->default('admin');
        $form->radio('status', __('Status'))->options(['Pending', 'Online', 'Offline']);
    
        return $form;
    }
}
