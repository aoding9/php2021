<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Profile;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProfileController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Profile(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('age');
            $grid->column('gender');
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
        return Show::make($id, new Profile(), function (Show $show) {
            $show->field('id');
            $show->field('id');
            $show->field('user_id');
            $show->field('age');
            $show->field('gender');
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
        return Form::make(new Profile(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('age');
            $form->text('gender');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
