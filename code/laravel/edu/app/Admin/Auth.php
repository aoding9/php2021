<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Auth
 *
 * @property int $id
 * @property string $auth_name 权限名称
 * @property string|null $controller 控制器名称
 * @property string|null $action 方法名称
 * @property int $pid 父级权限id,0表示顶级
 * @property string $is_nav
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Admin\Auth[] $child
 * @property-read \App\Admin\Auth $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Auth whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Auth whereAuthName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Auth whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Auth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Auth whereIsNav($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Auth wherePid($value)
 * @mixin \Eloquent
 */
class Auth extends Model
{
  //
  protected $table = 'auth';
  public $timestamps = false;

  // 自关联,父级权限对id 一对一
  public function parent()
  {
    return $this->hasOne(get_class($this), 'id', 'pid');
  }
  public function child()
  {
    return $this->hasMany(get_class($this), 'pid', 'id');
  }

  // public function allChildren()
  // {
  //   return $this->child()->with(['allChildren' => function ($query) {
  //     $query->select('id', 'pid', 'name');
  //   }]);
  // }

  // 
  static public function tree($auths, $pid = 0, $tree = [])
  {
    // 0级权限为顶级
    static $level = 1;
    foreach ($auths as $key => $value) {
      if ($value['attributes']['pid'] == $pid) {
        $tree[$key] =  (Object)$value['attributes'];
        $tree[$key]->level =  $level;
        if (!empty($value->child)) {
          $level++;
          $tree[$key]->child =  self::tree($value->child, $value['attributes']['id']);
        } else {
          $level=1;
          return $value['attributes'];
        }
      }
    }
    return $tree;
  }


}
