<?php

namespace App\Admin\Extensions\Export;

use Encore\Admin\Grid\Exporters\ExcelExporter;
use Maatwebsite\Excel\Concerns\WithMapping;

class CommentsExporter extends ExcelExporter implements WithMapping
{
    protected $fileName = '评论列表.xlsx';

    protected $columns = [
        'id'      => 'ID',
        'post_id' => '文章id',
        'content' => '内容',
    ];

    public function map($comment): array
    {
        return [
            $comment->id,
            $comment->post_id,
            $comment->content,
//        data_get($user, 'profile.created_at'),    // 读取关联关系数据
        ];
    }
}
