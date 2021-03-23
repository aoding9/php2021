<?php

namespace App\Admin\Extensions\Export;

use Encore\Admin\Grid\Exporters\ExcelExporter;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExporter extends ExcelExporter implements WithMapping
{
    protected $fileName = '用户列表.xlsx';

    protected $columns = [
        'id'                    => 'ID',
        'name'                  => '姓名',
        'email'                => '邮箱',
        'profile.created_at'      => '创建时间',
    ];

    public function map($user) : array
    {
        return [
            $user->id,
            $user->name,
            $user->gender ? '男' : '女',           // 字段数据替换
        data_get($user, 'profile.created_at'),    // 读取关联关系数据
        ];
    }
}
