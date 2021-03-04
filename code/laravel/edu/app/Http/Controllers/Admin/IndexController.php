<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller
{
  //首页
  public function index()
  {
    $user = Auth::guard('admin')->user();
    return view('admin.index.index',compact('user'));
  }
  public function welcome()
  {
    return view('admin.index.welcome');
  }

}
