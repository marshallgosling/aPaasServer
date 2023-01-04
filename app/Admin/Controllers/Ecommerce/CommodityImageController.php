<?php

namespace App\Admin\Controllers\Ecommerce;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Ecommerce\Commodity;
use App\Models\Ecommerce\CommodityImage;
use Illuminate\Support\Str;

class CommodityImageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Commodity Images';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CommodityImage, function ($model) {
            return $model->with(['commodity']);
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('image_url', __('Image'))->image("/storage/", 160, 100);
        $grid->column('commodity', 'Commodity')->display(function ($modal) {
            return $this->commodity->name;
        });

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            
            $filter->equal('commodity_id', 'Commodity')->select(
                Commodity::pluck('name', 'id')->toArray()
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
        $show = new Show(CommodityImage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image_url', __('Image'));
        $show->field('commodity_id', __('Commodity'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CommodityImage);

        $form->display('id', __('ID'));
        
        $form->select('commodity_id', __('Commodity'))->options(
            Commodity::pluck('name', 'id')->toArray()
        );

        $form->image('image_url', __('Image'));
        
        return $form;
    }
}
