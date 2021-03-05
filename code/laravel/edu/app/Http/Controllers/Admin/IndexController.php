<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Auth as AuthModel;
use Auth;

class IndexController extends Controller
{
  //首页
  public function index()
  {
    $user = Auth::guard('admin')->user();
    $auths = AuthModel::get();
    
    $auths = AuthModel::tree($auths);

    return view('admin.index.index',compact('user','auths'));
  }
  public function welcome()
  {
    return view('admin.index.welcome');
  }

}
