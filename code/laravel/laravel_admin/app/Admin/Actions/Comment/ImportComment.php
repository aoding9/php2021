<?php

namespace App\Admin\Actions\Comment;
use Excel;
use App\Imports\CommentsImport;
use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;

class ImportComment extends Action
{
    protected $selector = '.import-comment';

    public function handle(Request $request)
    {
        // 下面的代码获取到上传的文件，然后使用`maatwebsite/excel`等包来处理上传你的文件，保存到数据库
        $request->file('file');
        $import = new CommentsImport();
       Excel::import($import,$request->file('file'));
//        $str = "";
//        foreach (Excel::failures() as $failure) {
//            $str .=  ' 第'. $failure->row() . '行 失败原因：' . implode(' ', $failure->errors()) . '<br> 行数据：' . implode(' ', $failure->values()). '<br>';
//        }
//        if ($str !== '') {
//            return $this->response()->error($str)->topFullWidth()->timeout(7000000);
//        }
        return $this->response()->success('导入完成！')->refresh();


    }

    public function form()
    {
        $this->file('file', '请选择文件');
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-comment"><i class="fa fa-upload"></i>导入数据</a>
HTML;
    }
}
