<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Role;
use App\Admin\Auth;

class RoleController extends Controller
{
  //
  public function index()
  {
    // $role=new Role;

    $data = Role::get();
    return view('admin.role.index', compact('data'));
  }

  public function assign(Request $request)
  {
    if ($request->getMethod() == 'POST') {
      // 接收数据
      $data[] = $request->only(['id', 'auth_ids']);
      // dd($data[0]);

      // 自定义模型方法处理数据(不能用DB)
      $role = new Role();
      $result = $role->assignAuth($data[0]);
      return $result ? 1 : 0;
    } else {
      $role = Role::find($request->id);
      // $ids = Role::value('auth_ids');
      $auth_ids = explode(',',$role->auth_ids);
      // dd($ids);
      // dd($role);
      $auths = Auth::get();
      // dd($auths);
      // dd($auths[0]->child[0]->child);

      $auths = Auth::tree($auths);
      // dd($auths);
      return view('admin.role.assign', compact('role', 'auths','auth_ids'));
    }
  }
}
