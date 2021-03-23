<?php

namespace App\Imports;

use App\Models\Comment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CommentsImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Comment([
            'post_id' => $row[0],
//            'title' => $row[1],
            'content' => $row[1],
        ]);
    }
    // 从2行开始读取数据
    public function startRow(): int
    {
        return 2;
    }
    public function batchSize(): int
    {
        return 20;
    }
    // 验证
//    public function rules(): array
//    {
//        return [
//            '0' => 'required',
//        ];
//    }
    // 自定义验证信息
    public function customValidationMessages()
    {
        ['0.required' => '姓名未填'];
    }


}
