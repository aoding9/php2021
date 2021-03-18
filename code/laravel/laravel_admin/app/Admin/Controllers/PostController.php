<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Request;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // dd(Post::factory()->count(20)->create());
        $grid = new Grid(new Post());

        $grid->column('id', __('Id'));

        // 使用列扩展
        $grid->column('hh')->popover('right');
        $grid->column('id')->color2('red');

        $grid->column('title', __('Title'))->substr(1, 2);
        $grid->column('content', __('Content'))->limit(30)->ucfirst(); // 字符串可以直接使用Str辅助函数 ucfirst是php自带的首字母大写函数 
        // $grid->column('content', __('Content'))->display(function($text) {
        //     return mb_substr($text, 0, 30, 'utf8').'...';
        // });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('comment', '评论数')->display(function ($comments) {
            $count = count($comments);
            return "<span class='label label-warning'>{$count}</span>";
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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post());

        $form->text('title', __('Title'));
        $form->textarea('content', __('Content'));

        return $form;
    }
}
