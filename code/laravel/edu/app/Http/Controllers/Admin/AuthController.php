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
      // 这里没有采用DB写自关联,而是用模型写的
      $data = Auth::get();
    
      // dd($data[2]->parent->auth_name);
      // dd($data[0]->child[0]->child);
      return view('admin.auth.index',compact('data'));
    }
    // 添加权限
    public function add(Request $request)
    {
      // 引入Input门面来判断请求类型(自己给自己提交)
      // if(Input::method() == 'POST'){
        // 这里用$request来搞
      if($request->getMethod() == 'POST'){
        // 处理数据
        // 验证数据
        // 操作模型
        // $data = Input::except('_token');
        // dd($data);
        // $result= Auth::insert($data);
        $auth = new Auth;
        $auth -> auth_name=$request->auth_name;
        $auth -> controller = strtolower($request->controller);
        $auth -> action=$request->action;
        $auth -> pid=$request->pid;
        $auth -> is_nav=$request->is_nav;
        $result=$auth->save();
        // 拉若框架不能响应布尔值,所以用数字
        return $result?'1':'0';
      }else{
        // 查父级权限名称列表
        $parents = Auth::where('pid','=','0')->get();

        // 权限树
        $auths = Auth::tree(Auth::get());
        // dd($auths);
        // 展示视图
        return view('admin.auth.add',compact('parents','auths'));
      }
    }
}
