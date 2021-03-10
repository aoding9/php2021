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

  // 递归 返回权限树
  static public function tree($auths, $pid = 0, $tree = [])
  {
    // 记录当前递归的层级,也就是权限层级,0级权限为顶级权限的父级
    static $level = 1;
    // 循环每个row
    foreach ($auths as $key => $value) {
      // 第一层,如果pid!=0,说明不是顶级权限,直接跳过(减少重复递归)
      // 第二层,如果pid!=顶级权限id,说明不是二级权限,直接跳过 ...
      if ($value['attributes']['pid'] == $pid) {
        $tree[$key] =  (Object)$value['attributes']; // 转成对象形式,方便在模板里面使用
        $tree[$key]->level =  $level; // 记录当前层级
        // 调用上面定义的child方法判断有没有子级
        if (!empty($value->child)) {
          $level++;  // 有子级,那么下一次递归的层级+1
          $tree[$key]->child =  self::tree($value->child, $value['attributes']['id']); // 追加child属性,然后对child属性的赋值进行递归(将子级权限作为下一次递归的循环项,id作为新的父级id)
        } else {
          $level=1;  // 没有子级,说明一个顶级权限分支递归到底了,重置为1级权限,
          return $value['attributes']; //  返回底层权限row的字段列表,向上回归到child赋值,然后结束一轮顶层循环,继续递归下一个顶级权限
        }
      }
    }
    return $tree; // 递归完成,返回整个tree
  }


}
