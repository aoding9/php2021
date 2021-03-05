<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use App\Admin\Auth;

class AuthController extends Controller
{
    // 权限管理
    public function index()
    {
      return view('admin.auth.index');
    }
    // 添加权限
    public function add(Request $request)
    {
      // 引入Input门面来判断请求类型(自己给自己提交)
      // if(Input::method() == 'post'){
        // 这里用$request来搞
      if(strtolower($request->getMethod()) == 'post'){
        // 处理数据
        // 验证数据
        // 操作模型
        // $data = Input::except('_token');
        // dd($data);
        // $result= Auth::insert($data);
        $auth = new Auth;
        $auth -> auth_name=$request->auth_name;
        $auth -> controller=$request->controller;
        $auth -> action=$request->action;
        $auth -> pid=$request->pid;
        $auth -> is_nav=$request->is_nav;
        $result=$auth->save();
        // 拉若框架不能响应布尔值,所以用数字
        return $result?'1':'0';
      }else{
        // 查父级权限名称列表
        $parents = Auth::where('pid','=','0')->get();
        // 展示视图
        return view('admin.auth.add',compact('parents'));
      }
    }
}
