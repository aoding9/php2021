<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\Auth as AuthModel;

class TestController extends Controller
{
  //
  public function test1()
  {
    $data = Admin::first();
    $pwd = bcrypt('123456');
    // $pwd=Hash::make('123456');
    // $pwd = Hash::make('123456', [
    //   'rounds' => 12,
    // ]);
    // dd($pwd);
    // dd(strlen($pwd));
    return view('test1', compact('data'));
  }

  public function test1_1(Request $request)
  {
    $credentials = $request->only(['mobile', 'password']);
    // dd(Hash::make('123456'));
    // dd(Crypt::encryptString('123456'));
    // dd($credentials);
    // dd(Auth::attempt($credentials));
    if (Auth::attempt($credentials)) {
      // 认证通过．．．
      // dd('登录成功');
      // dump(11);
      return redirect()->route('index');
    }
  }
  public function test2(Request $request)
  {
    // $user = Auth::user();
    // $user =  $request->user();
    // $id = Auth::id();
    // dd($user);
    // dd($id);
    // dd(Auth::check());
    // $tree = AuthModel::tree(Auth::user()->role,true);
    $tree = AuthModel::tree(Auth::user()->role);
    return view('test2', compact('tree'));
  }
  public function logout()
  {
    Auth::logout();
    return redirect('/test1');
  }
}
