<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth as AuthModel;
use Gate;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  //
  public function index(Request $request)
  {
    $tree = AuthModel::tree(Auth::user()->role);
    return view('auth.index', compact('tree'));
  }
  public function add(Request $request)
  {
    // if (Gate::allows('add-auth')) {
    //   dd('有权限');
    //   return view('auth.add');
    // }
    // dd('没权限');

    if($request->method()=='POST'){
      $auth = new AuthModel;
      $data= $request->except(['_token']);
      $auth->insert($data);
      

    }
      $tree = AuthModel::tree(0, 1, 1, 1);
      return view('auth.add', compact('tree'));
  }
  public function update(Request $request)
  {
    $tree = AuthModel::tree(0, 1, 1, 1);
    return view('auth.update', compact('tree'));
  }
}
