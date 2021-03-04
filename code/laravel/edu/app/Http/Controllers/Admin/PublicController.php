<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PublicController extends Controller
{
  // 登录页展示
  public function login()
  {
    return view('admin.public.login');
  }
  public function check(Request $request)
  {
    // 参数验证
    $this->validate($request, [
      'username' => 'required|min:2|max:20',
      'password' => 'required|min:6|max:20',
      'captcha' => 'required|size:2|captcha',
    ]);

    // 身份验证
    $data = $request->only(['username', 'password']);
    $data['status'] = '2'; // 只查启用状态的用户
    $remember = $request->get('online');
    $result = Auth::guard('admin')->attempt($data, $remember);
    // dd($result);

    // 是否成功
    if ($result) {
      return redirect()->route('index');
    } else {
      return redirect()->route('login')->withErrors([
        'msg' => '用户名或密码错误'
      ]);
    }
  }

  // 退出
  public function logout()
  {
    Auth::guard('admin')->logout();
    return redirect()->route('login');
  }
}
