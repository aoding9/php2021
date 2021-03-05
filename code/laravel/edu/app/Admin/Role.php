<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use \App\Admin\Auth;

/**
 * App\Admin\Role
 *
 * @property int $id
 * @property string $role_name 角色名称
 * @property string $auth_ids 权限id集合
 * @property string $auth_ac 权限控制器和方法组合
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Role whereAuthAc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Role whereAuthIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Role whereRoleName($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
  //
  protected $table = 'role';
  public $timestamps = false;

  public function assignAuth($data)
  {
    // 处理数据
    $post['auth_ids'] = implode(',', $data['auth_ids']);
    // 获取 auth_ac
    $tmp = Auth::where('pid', '!=', '0')->whereIn('id', $data['auth_ids'])->get();
    // $post['auth_ac'] = implode(',', $tmp);
    // 循环拼接controller和action
    $ac = '';
    foreach ($tmp as $key => $value) {
      $ac = "{$ac}{$value->controller}@{$value->action},";
    }
    // 去除末尾逗号
    $post['auth_ac'] = rtrim($ac, ',');
    // dd($post);
    // 修改数据
    return self::where('id', $data['id'])->update($post);
  }
}
