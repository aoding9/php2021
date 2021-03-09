<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lesson;

class LessonController extends Controller
{
    public function index()
    {
      $data = Lesson::orderBy('sort','desc')->get();
      return view('admin.lesson.index',compact('data'));
    }

    public function play(Request $request)
    {
      // 获取id
      // $id = $request->get('id');
      $id = $request->id;
      // 查视频地址
      $data = Lesson::where('id',$id)->value('video_addr');
      // dd($data);
      // 返回播放视频
      return "<video src='$data' controls='controls' style='height:90%'>您的浏览器不支持video标签</video>";
    }
}
