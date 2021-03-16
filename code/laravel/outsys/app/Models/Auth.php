<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
  // use HasFactory;
  protected $table = 'auth';
  public function role()
  {
    return $this->belongsToMany('App\Models\Role', 'role_auth', 'auth_id', 'role_id');
  }

  // 根据角色获取权限树
  static public function tree(\App\Models\Role $role,$is_menu=false,$tree=[])
  {
    $auths = $role->auth;
    dd($auths);
    $tree = [];
    foreach ($auths as $key => $value) {
      if($is_menu&&!$value->is_menu) continue;
      // dd($value);
      // 一级权限
      static $topkey;
      if ($value->pid == 0) {
        $topkey = $key;
        $children = $tree[$topkey]->children??[];
        $tree[$topkey] =(Object)$value->attributes;
        $tree[$topkey]->children =$children;
        // $tree[$value->id] = array_merge($value->attributes,$tree[$value->pid]['children']??[]);
        // dump('一级');
      } else {
        // 二级权限
        // dump('二级');
        $tree[$value->pid]->children[] = (Object)$value->attributes;
        // dump($tree[$value->pid]);
      }
    }
    // dd($tree);
    return $tree;
  }
}
