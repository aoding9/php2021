<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Manager;

class ManagerController extends Controller
{
    // 管理员列表
    public function index()
    {
      $data = Manager::get(); // 查全部
      return view('admin.manager.index',compact('data'));
    }
}
