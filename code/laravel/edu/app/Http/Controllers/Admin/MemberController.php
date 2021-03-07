<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MemberController extends Controller
{
  public function index()
  {
    $data = Member::get();
    return view('admin.member.index',compact('data'));
  }
  public function add(Request $request)
  {
    if($request->getMethod()=='POST'){
      // 实现数据保存
      // 数据验证,此处略过
      // ORM模型插入数据库
      $member = new Member();
      $member->username=$request->username;
      $member->password=bcrypt($request->password);
      $member->gender=$request->gender;
      $member->mobile=$request->mobile;
      $member->email=$request->email;
      $member->avatar=$request->avatar;
      $member->country_id=$request->country_id;
      $member->province_id=$request->province_id;
      $member->city_id=$request->city_id;
      $member->county_id=$request->county_id;
      $member->type=$request->type;
      $member->status=$request->status;
      $member->created_at= date('Y-m-d H:i:s');

     return $member->save()?'1':'0';

    }else{
      $country = DB::table('area')->where('pid','0')->get();
      return view('admin.member.add',compact('country'));
    }
  }

  // ajax四级联动获取地区
  public function getAreaById(Request $request)
  {
    // 根据id查下属地区
    $id = $request->id;
    $data =DB::table('area')->where('pid',$id)->get();
    // 返回json数据
    return response()->json($data);
  }

  // ajax头像上传
  public function webuploader(Request $request)
  {
    // 根据id查下属地区
    $id = $request->id;
    $data =DB::table('area')->where('pid',$id)->get();
    // 返回json数据
    return response()->json($data);
  }
}
