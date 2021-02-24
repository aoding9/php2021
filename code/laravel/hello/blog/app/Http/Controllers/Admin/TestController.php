<?php

namespace App\Http\Controllers\Admin;

// 由于和基础控制器的命名空间不同,所以要引入命名空间
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
  public function test1_2()
  {
    return '我是test1_2';
  }
}
