<?php

use Encore\Admin\Grid;

 Grid::init(function (Grid $grid) {

    $grid->disableExport();

});

Encore\Admin\Form::forget(['map', 'editor']);
