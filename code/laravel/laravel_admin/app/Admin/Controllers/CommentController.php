<?php

namespace App\Admin\Controllers;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Comment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // dd(Comment::factory()->count(20)->create());

        $grid = new Grid(new Comment());


        $grid->model()->collection(function (Collection $collection) {

            // dd($collection);
            // 1. 可以给每一列加字段，类似上面display回调的作用
            // foreach($collection as $item) {
            //     $item->full_name = $item->first_name . ' ' . $item->last_name;
            // }
            
            // 2. 给表格加一个序号列
            foreach($collection as $index => $item) {
                $item->number = $index;
                // dump($item);
                // $item->content = $item->$content;
            }
        
            // 3. 从外部接口获取数据填充到模型集合中
            // $ids = $collection->pluck('id');
            // $data = getDataFromApi($ids);
            // foreach($collection as $index => $item) {
            //     $item->column_name = $data[$index];
            // }
        
            // 最后一定要返回集合对象
            return $collection;
        });


        $grid->column('id', __('Id'));
        $grid->column('number', __('collection 添加的序号'));
        // $grid->column('post_id', __('Post id'));
        $grid->column('post.title', __('title'));
        $grid->column('content', __('Content'))->display(function($str){
            return mb_substr($str,0,30,'utf8').'...';
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

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
        $show = new Show(Comment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('post_id', __('Post id'));
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
        $form = new Form(new Comment());

        $form->number('post_id', __('Post id'));
        $form->text('content', __('Content'));

        return $form;
    }
}
