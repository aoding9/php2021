<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Tree;

class CategoryController extends AdminController
{
    public function index(Content $content)
    {
        $tree = new Tree(new Category);
//        dd($tree);
//        $tree->query(function ($model) {
//            return $model->where('created_at', '>',1);
//        });
        $tree->branch(function ($branch) {
//            $src = config('admin.upload.host') . '/' . $branch['logo'] ;
//            $logo = "<img src='$src' style='max-width:30px;max-height:30px' class='img'/>";

            return "{$branch['id']} - {$branch['title']}";
//            return "{$branch['id']} - {$branch['title']} $logo";
        });
        return $content
            ->header('树状模型')
            ->body($tree);
    }
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('order', __('Order'));
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('parent_id', __('Parent id'));
        $show->field('order', __('Order'));
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
        $form = new Form(new Category());

        $form->text('title', __('Title'));
        $form->number('parent_id', __('Parent id'));
        $form->number('order', __('Order'));

        return $form;
    }
}
