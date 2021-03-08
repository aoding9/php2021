<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Protype;

class ProtypeController extends Controller
{
    //
  public function index()
  {
    $data = Protype::orderBy('sort','desc')->get();
    return view('admin.protype.index',compact('data'));
  }
}
