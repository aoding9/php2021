<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Movie;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class MovieController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Movie(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('director');
            $grid->column('describe');
//            $grid->column('rate')
            // 设置进度条
            $grid->column('rate')->display(function($f){
                return random_int(0,99);
//                这里有坑，最大值仅仅显示到aria-maxvalue中用于前端获取，没有实际对进度产生约束效果
            })->progressBar('success', 'sm', 100);
            $grid->column('released');
            $grid->column('release_at');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Movie(), function (Show $show) {
            $show->field('id');
            $show->field('id');
            $show->field('title');
            $show->field('director');
            $show->field('describe');
            $show->field('rate');
            $show->field('released');
            $show->field('release_at');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Movie(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('director');
            $form->text('describe');
            $form->text('rate');
            $form->text('released');
            $form->text('release_at');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
