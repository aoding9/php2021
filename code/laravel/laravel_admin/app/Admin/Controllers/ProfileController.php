<?php

namespace App\Admin\Controllers;

use App\Models\Profile;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProfileController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Profile';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // dd(Profile::factory()->count(20)->create());
        $grid = new Grid(new Profile());

        // $grid->fixColumns(2); // 固定前2列 
        // width color方法有冲突,可能都是基于->setAttributes(['style' => 'color:red;']);所以覆盖了
        $grid->column('id', __('id'))->help('这一列是id')->width(30)->color('blue');
        // $grid->column('user_id', __('User id'));
        $grid->column('user.name', __('username'));
        $grid->column('user.name', __('username'))->hide();// 隐藏列
        // $grid->user()->name();
        $grid->column('age', __('age'))->style('color:red')->sortable(); // 可排序列
        $grid->column('gender', __('gender'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Profile::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('age', __('Age'));
        $show->field('gender', __('Gender'));
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
        $form = new Form(new Profile());

        $form->number('user_id', __('User id'));
        $form->text('age', __('Age'));
        $form->switch('gender', __('Gender'));

        return $form;
    }
}
