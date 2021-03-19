<?php
namespace App\Admin\Renderable;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Comment;
use App\Models\Post;
use Encore\Admin\Widgets\Table;


// 异步加载 模态框 先定义可渲染类

class ShowComments implements Renderable
{
    public function render($key = null)
    {


        $comments = Post::find($key)->comments;
            //   $comments = Post::find($key)->comments()->take(10)->get()->map(function ($comment) {
            //     return $comment->only(['id', 'content', 'created_at']);
            // });

            // dump($comments);
            return (new Table(['ID', '内容', '发布时间'], $comments->toArray()))->render();
    }
}