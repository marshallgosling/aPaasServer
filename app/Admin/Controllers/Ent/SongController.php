<?php

namespace App\Admin\Controllers\Ent;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ent\Song;


class SongController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Songs';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Song, function ($model) {
            //return $model->with(['users']);
        });

        //$grid->model()->orderBy('id', 'desc');

        //$grid->column('id', __('ID'))->sortable();
        $grid->column('song_no', __('No.'));
        $grid->column('image_url', __('Image'))->image('', 40, 40);
        $grid->column('song_name', __('Name'));
        
        $grid->column('singer', __('Singer'));
        $grid->column('status', __('Status'))->using(
            [
                Song::STATUS_READY  => 'Ready',
                Song::STATUS_CLOSE => 'Closed'
            ]
        );
        $grid->column('link', __('Url'))->display(function () {
            return "url";
        })->expand(function ($model) {
            return "<p>{$model->song_url}</p>";
        });
        $grid->column('lyrics', __('Lyric'))->display(function () {
            return "Lyric";
        })->expand(function ($model) {
            return '<p>'.$model->lyric.'</p>';
        });
        $grid->column('created_at', __('Created at'));
        
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
        $show = new Show(Song::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('song_no', __('No.'));
        $show->field('song_name', __('Name'));
        $show->field('image_url', __('Image'))->image();
        $show->field('singer', __('Singer'));
        $show->field('status', __('Status'));
        $show->field('song_url', __('Url'));
        $show->field('lyric', __('Lyric'));
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
        $form = new Form(new Song);

        $form->display('id', __('ID'));
        $form->text('song_no', __('No.'));
        $form->text('song_name', __('Name'));
        
        $form->image('image_url', __("Image"));
        $form->text('singer', __('Singer'));
        
        $form->text('url', __('Url'));
        $form->text('lyric', __('Lyric'));

        $form->radio('status', __('Status'))->options(
            [
                Song::STATUS_READY  => 'Ready',
                Song::STATUS_CLOSE => 'Closed'
            ]
        );

        return $form;
    }
}
