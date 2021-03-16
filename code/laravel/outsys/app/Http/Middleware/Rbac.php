<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Rbac
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    // 获取当前路径
    $current_path = "/".$request->path();
    // dd($current_path);
    // 获取用户角色所有权限
    $auths = Auth::user()->role->auth;
    // $paths = [];
    $flag=false;


    foreach ($auths as $value) {
      // $paths[] = $value->path;
      
      $preg = $value->path;
      $preg = preg_replace("/\/\{\w+[^\/|?]\}/", "/?\w+", $preg); // 替换必填参数
      $preg = preg_replace("/\/\{\w+[^\/]\\?}/", "/?\w*", $preg); // 替换可选参数
      $preg = preg_replace("/\//", "\\/",$preg );          // 替换路由分割的斜杠
      $preg = "/". $preg."/";
      $flag = preg_match ($preg,$current_path); // 执行匹配
      // dump($preg);
      if($flag){
        break;// 确认有权限了,终止循环
      }
    }
    // dd($paths);
    // dd($request->path()); // 开头缺一个斜杠/
    // $current_path = $request->path();
    // $has_auth = in_array($current_path, $paths);
    // dd($has_auth);
    
    // dd($flag);
    if ($flag) {
      // dd('有权限');
      return $next($request);
    }else{
      dd('没权限');
    }
  }
}
