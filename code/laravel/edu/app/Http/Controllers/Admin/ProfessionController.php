<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Profession;

class ProfessionController extends Controller
{
  public function index()
  {
    $data = Profession::orderBy('sort','desc')->get();
    return view('admin.profession.index',compact('data'));
  }

}
