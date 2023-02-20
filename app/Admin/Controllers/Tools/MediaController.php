<?php

namespace App\Admin\Controllers\Tools;

use App\Models\Common\Media;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MediaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Media';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Media());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('audio', __('Audio'));
        $grid->column('video', __('Video'));
        $grid->column('status', __('Status'))->using(
            [Media::STATUS_DEFAULT=>'Default',Media::STATUS_PROCESSING => 'Processing', Media::STATUS_READY => 'Ready', Media::STATUS_DELETED=>'Deleted'], 'Unknown'
        );
        //$grid->column('source', __('Source'));
        $grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Media::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('audio', __('Audio'));
        $show->field('video', __('Video'));
        $show->field('status', __('Status'))->using(
            [Media::STATUS_DEFAULT=>'Default',Media::STATUS_PROCESSING => 'Processing', Media::STATUS_READY => 'Ready']
        );
        $show->field('source', __('Source'));
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
        $form = new Form(new Media());

        $form->text('name', __('Name'));
        $form->text('audio', __('Audio'));
        $form->text('video', __('Video'));
        $form->radio('status', __('Status'))->options(
            [Media::STATUS_DEFAULT=>'Default', Media::STATUS_PROCESSING => 'Processing', Media::STATUS_READY => 'Ready']
        );
        $form->text('source', __('Source'));

        return $form;
    }
}
