<?php

namespace App\Http\Middleware;

use Closure;

use Route;
use Auth;

class checkRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // 获取当前角色信息
      $user = Auth::guard('admin')->user();

      // 排除超级管理员
      if($user->role_id!='1'){

        // 获取当前路由方法 App\Http\Controllers\Admin\IndexController@index
        $route = Route::currentRouteAction();
        $arr = explode('\\',$route);
        // 截取\后的最后一段即可，并且转成小写
        // 注意：由于end直接操作指针，是应用传值，所以必须传变量，不能直接放函数返回值
        $currentAc = strtolower(end($arr));
        // 获取当前角色ac集合
        $roleAc=$user->role->auth_ac;
        // 所有人都有后台首页和欢迎页的权限
        $roleAc = $roleAc.'indexcontroller@index,indexcontroller@welcome';
        // 比对权限,全等于
        // strpos返回匹配字符串首次出现的位置
        if(strpos($roleAc,$currentAc)===false){
          exit('<h1>没有权限</h1>');
        }
        // dd($ac);
        
      }
      // 继续请求
      return $next($request);
    }
}
