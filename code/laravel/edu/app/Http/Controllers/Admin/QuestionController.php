<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Question;
use App\Admin\Paper;
use Excel;

class QuestionController extends Controller
{
  public function index()
  {
    $data = Question::get();
    return view('admin.question.index', compact('data'));
  }
  public function export()
  {
    $data = Question::get();
    $cellData = [
      ['序号', '题干', '所属试卷', '分值', '选项', '正确答案', '添加时间'],
    ];
    foreach ($data as $k => $v) {
      $cellData[] = [
        $v->id,
        $v->question,
        $v->paper->paper_name,
        $v->score,
        $v->options,
        $v->answer,
        $v->created_at,
      ];
    }
    // 门面必须use才能使用外面的数据
    $res = Excel::create(sha1(time() . rand(1000, 9999)), function ($excel) use ($cellData) {
      $excel->sheet('score', function ($sheet) use ($cellData) {
        $sheet->rows($cellData);
      });
    })->export('xls');
    // dd($res);
  }

  public function import(Request $request)
  {
    if ($request->getMethod() == 'POST') {

      // 数据导入
      $filePath = '.' . $request->excelpath; // 文件路径
      Excel::load($filePath, function ($reader) use ($request) {
        // $data = $reader->all();  这样写不行,改成下面这种
        $data = $reader->getSheet(0)->toArray();
        // dd($data);
        // 转为2维数组,然后一起插入
        $temp = [];
        foreach ($data as $k => $v) {
          if ($k == '0') {
            continue; // 跳过表头
          }
          $temp[] = [
            'question' => $v[0],
            'paper_id' => $request->paper_id,
            'score' => $v[3],
            'options' => $v[1],
            'answer' => $v[2],
            'created_at' => date('Y-m-d H-i-s'),
          ];
        }
        // 插入数据库 返回结果
        $result = Question::insert($temp);
        echo $result ? '1' : '0'; // 不能用return(这是闭包里面) 要echo
      });
    } else {

      // 获取试卷列表
      $papers = Paper::get();
      return view('admin.question.import', compact('papers'));
    }
  }
}
