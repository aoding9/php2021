<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\BatchReplicate;
use App\Models\Comment;
use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Admin\Renderable\ShowComments;
use App\Admin\Actions\Post\Replicate;
use App\Admin\Actions\Post\Restore;
use App\Admin\Extensions\Tools\ReleasePost;
use Request;
use App\Admin\Actions\Post\BatchRestore;


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
        // dd(Post::factory()->count(5)->create());
        $grid = new Grid(new Post());

        // label 渲染为标签tag
        // icon 渲染图标
        // $grid->column('id', __('Id'))
        //     // ->label([
        //     //     1 => 'default',
        //     //     2 => 'warning',
        //     //     3 => 'success',
        //     //     4 => 'info',
        //     // ])
        //     ->icon([
        //         0 => 'toggle-off',
        //         1 => 'toggle-on',
        //     ], $default = 'toggle-off');

        // 渲染小圆点
        // $grid->column('id')->using([
        //     1 => '审核通过',
        //     2 => '草稿',
        //     3 => '发布',
        //     4 => '其它',
        // ], '未知')->dot([
        //     1 => 'danger',
        //     2 => 'info',
        //     3 => 'primary',
        //     4 => 'success',
        // ], 'warning');

        // 使用列扩展
        $grid->column('id')->color2('green');
        // $grid->column('hh')->popover('right');

        // _是翻译辅助函数
        // $grid->column('title', __('Title'))->substr(1, 2);

        // display的使用和即时编辑
        // $grid->column('title', __('Title'))->display(function ($title, $column) {

        //     // 如果这一列的status字段的值等于1，直接显示title字段
        //     if ($this->status == 1) {
        //         return $title;
        //     }

        //     // 否则显示为editable(点击即可编辑)
        //     return $column->editable();
        // });

        // 列展开,如果一行的字段比较多，可以通过列展开功能，来隐藏过多的内容。通过点击列来展开显示，或者点击展开相关的其它数据，比如下面的例子，用来展开一条文章下的10条最新评论
        // $grid->column('title', '标题')->expand(function ($model) {

        //     $comments = $model->comments()->take(10)->get()->map(function ($comment) {
        //         return $comment->only(['id', 'content', 'created_at']);
        //     });

        //     return new Table(['ID', '评论内容', '发布时间'], $comments->toArray());
        // });


        // 弹出模态框
        $grid->column('title', '标题')->modal(ShowComments::class);

//        $grid->column('cover', '封面图')->display(function($img){
//            // dd($img);
//            if($img){
//                return "<img src='/uploads/$img' width='50'>";
//            }else{
//                return "暂无";
//            }
//        });
        $grid->column('cover', '封面图')->image('',80);

        // $grid->column('title', '标题')->modal('最新评论', function ($model) {

        //     $comments = $model->comments()->take(10)->get()->map(function ($comment) {
        //         return $comment->only(['id', 'content', 'created_at']);
        //     });

        //     return new Table(['ID', '内容', '发布时间'], $comments->toArray());
        // });


        // 根据数据字段获取头像,参数是尺寸
        // $grid->column('id', '头像')->gravatar(40);


        // 字符串可以直接使用Str辅助函数 ucfirst是php自带的首字母大写函数
        // $grid->column('content', __('Content'))->limit(30)->ucfirst();

        // $grid->column('content', __('Content'))->display(function($text) {
        //     return mb_substr($text, 0, 30, 'utf8').'...';
        // });

        // 列视图,直接渲染视图,默认会传入视图的两个变量，$model为当前行的模型，$value为当前列的值
        $grid->column('content')->view('test1');
        // copyable将渲染出复制按钮,一键复制内容
        // qrcode 根据链接生成二维码
        $grid->column('created_at', __('Created at'))->copyable()->qrcode();
        // label 将该列渲染为标签
        $grid->column('updated_at', __('Updated at'))->label('danger');
        // $grid->column('deleted_at', __('Deleted at'));

        // 布尔值显示
        $grid->column('deleted_at')->bool();

        $grid->column('comments', '评论数')->display(function ($comments) {
            $count = count($comments);
            return "<span class='label label-warning'>{$count}</span>";
        });

        // 过滤器
        // 默认展开：方式一：在`$grid`实例上操作
        // $grid->expandFilter();
        $grid->filter(function ($filter) {
            // 默认展开：方式二：filter回调里面操作`$filter`实例
            $filter->expand();

            // 去掉默认的id过滤器
            // $filter->disableIdFilter();

            // 在这里添加字段过滤器
            // $filter->like('name', 'name');

            $filter->scope('male', '男性')->where('gender', 'm');

            // 多条件查询
            $filter->scope('new', '最近修改')
                ->whereDate('created_at', date('Y-m-d'))
                ->orWhere('updated_at', date('Y-m-d'));

            // 关联关系查询
            $filter->scope('address')->whereHas('profile', function ($query) {
                $query->whereNotNull('address');
            });

            $filter->scope('trashed', '被软删除的数据')->onlyTrashed();

            $filter->between('created_at', '创建时间')->datetime();
        });

        // 操作列

        $grid->actions(function ($actions) {
            $actions->add(new Replicate);
        });

        // 批量操作
        $grid->batchActions(function ($batch) {
            $batch->add(new BatchReplicate());
        });

        // 批量改文章
        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->add('发布文章', new ReleasePost(1));
                $batch->add('文章下线', new ReleasePost(0));
            });
        });

        $grid->column('action');

        // 回收站,软删除,恢复
        $grid->filter(function ($filter) {

            // 范围过滤器，调用模型的`onlyTrashed`方法，查询出被软删除的数据。
            $filter->scope('trashed', '回收站')->onlyTrashed();
        });
        $grid->actions(function ($actions) {

            if (\request('_scope_') == 'trashed') {
                $actions->add(new Restore());
            }
        });

        // 批量恢复

        $grid->batchActions(function ($batch) {

            if (\request('_scope_') == 'trashed') {
                $batch->add(new BatchRestore());
            }
        });

        return $grid;
    }
    // 批量改文章的接口方法
    public function release()
    {
        // dump($request);
        $ids = request()->get('ids');
        foreach (Post::find($ids) as $post) {
            $post->action = request()->get('action');
            $post->save();
        }
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

        $show->field('id', 'ID');
//        $show->field('id')->badge();;

        $show->field('title', '标题');
//        $show->field('content', '内容');
        $show->field('rate');
        $show->field('created_at');
        $show->field('updated_at');
        $show->field('release_at');
        $show->divider();
        $show->field('cover')->image();
        $show->json1()->json();
        $show->field('content')->unescape()->as(function ($avatar) {

            return "<section>{$avatar}</section>";

        });

        $show->panel()
            ->style('danger')
            ->title('post基本信息...');


        $show->author('作者信息', function ($author) {

            $author->setResource('/admin/users');

            $author->id();
            $author->name();
            $author->email();
        });
        $show->comments('评论', function ($comments) {

            $comments->resource('/admin/comments');

            $comments->id();
            $comments->content()->limit(10);

            $comments->filter(function ($filter) {
                $filter->like('content');
            });
        });

        $show->column('cover')->unserialize(Post::find($id));

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

//        $form->textarea('content', __('Content'));
        $form->editor('content', __('Content'));

        // 上传图片的同时生成缩略图
        // 这里的图片显示路径会自动拼接.env的app路径
         $form->image('cover')->removable();
        // $form->image('cover')->thumbnail('small', $width = 300, $height = 300);

        // 或者多张缩略图
        // $form->image('cover'])->thumbnail([
        //     'small' => [100, 100],
        //     'small' => [200, 200],
        //     'small' => [300, 300],
        // ]);

        // $form->file('cover')->rules('mimes:jpg');
//        $form->file('cover')->removable();
        // $form->file('cover')->downloadable();

        // $form->multipleImage('cover')->removable();
        // $form->multipleImage('cover')->sortable()->removable();

//        json
//        $form->keyValue('json1');

        $form->embeds('json1','json1', function ($form) {

            $form->text('key1')->rules('required');
            $form->email('email')->rules('required');
            $form->datetime('key3');
            $form->dateRange('key4', 'key5', '范围')->rules('required');

        });
        return $form;
    }
}
