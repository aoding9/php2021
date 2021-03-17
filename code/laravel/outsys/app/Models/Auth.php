<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Auth
 *
 * @property int $id
 * @property int $pid 父级权限id
 * @property string $auth_name 权限名称
 * @property int $status 1启用0禁用
 * @property int $sort 排序
 * @property string|null $icon 图标类名
 * @property int $is_menu 是否为菜单
 * @property string $path 允许访问的路径
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $role
 * @property-read int|null $role_count
 * @method static \Illuminate\Database\Eloquent\Builder|Auth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auth query()
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereAuthName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereIsMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Auth extends Model
{
  use SoftDeletes;
  // use HasFactory;
  protected $table = 'auth';


  public function role()
  {
    return $this->belongsToMany('App\Models\Role', 'role_auth', 'auth_id', 'role_id');
  }

  // 自关联,父级权限对id 一对一
  public function parent()
  {
    return $this->hasOne(get_class($this), 'id', 'pid');
  }

  // 自关联,子级权限对id 一对多
  // 参数是查询条件
  static public function children($pid = 0, $role_id = -1, $is_menu = -1, $status = -1)
  {
    // 这两种写法是差不多的,但是我需要多条件查询,所以不用模型关联来写
    // return $this->hasMany(get_class($this), 'pid', 'id')->orderBy('sort');
    $menu_symbol =  $is_menu == -1 ? '<>' : '=';
    $status_symbol =  $status == -1 ? '<>' : '=';

    // 如果传了角色id,那么就用连表查询,模型关联写这个不太好弄,条件太多了
    if ($role_id != -1) {
      // 获取权限
      $auths = DB::table('role_auth as t1')  // 结合中间表进行关联查询
        ->leftJoin('auth as t2', 't1.auth_id', 't2.id')
        ->where('pid', $pid)
        ->where('role_id', $role_id)
        ->where('status', $status_symbol, $status)
        ->where('is_menu', $menu_symbol, $is_menu)
        ->whereNull('deleted_at') // 软删除
        ->orderBy('t2.sort')
        ->get();

      // dump($auths);
    } else {
      $auths = self::where('pid', $pid)
        ->where('pid', $pid)
        ->where('status', $status_symbol, $status)
        ->where('is_menu', $menu_symbol, $is_menu)
        ->whereNull('deleted_at')
        ->orderBy('sort')
        ->get();
    }

    return $auths;
  }

  // 递归 返回权限树
  static public function tree2($auths = [], $pid = 0, $role_id = -1, $is_menu = -1, $status = -1)
  {
    // 记录当前递归的层级,也就是权限层级,0级权限为根
    static $level = 0;

    // 获取pid对应的权限,获取过的就不用重复获取了
    if (count($auths) == 0) {
      $auths = Auth::children($pid, $role_id, $is_menu, $status);
    }


    // 保存权限树的数组
    $tree = [];

    // 循环每个row
    foreach ($auths as $key => $value) {

      if ($value->pid == $pid) {

        $level++;  // 递归的层级+1
        $tree[$key] =  $value; // 赋值属性
        $tree[$key]->level =  $level; // 记录当前层级

        // 调用上面定义的children方法获取子级权限

        $auths = Auth::children($value->id, $role_id, $is_menu, $status);


        // 判断是否有子级
        if (count($auths) != 0) {
          // 设置children属性,然后对children属性的赋值进行递归(将子级权限作为下一次递归的循环项,id作为新的父级id,同时把上面获取过的权限传过去,以免重复获取)
          $tree[$key]->children =  Auth::tree($auths, $value->id, $role_id, $is_menu, $status);
        } else {
          $level = 1;  // 没有子级,说明一个顶级权限分支递归到底了,重置为1级权限,
        }
      }
    }

    return $tree; // 返回tree
  }

  // 简化版,因为只有2个层级,不用递归,不用做最低级权限的children判断查询
  static public function tree($role_id = -1, $is_menu = -1, $status = -1)
  {
    $pid = 0;
    // 获取一级权限
    $auths = Auth::children($pid, $role_id, $is_menu, $status);

    // 保存权限树的数组
    $tree = [];

    // 遍历一级权限
    foreach ($auths as $key => $value) {

      $tree[$key] =  $value; // 属性赋值

      // 调用上面定义的children方法获取子级权限

      $auths = Auth::children($value->id, $role_id, $is_menu, $status);

      foreach ($auths as $key2 => $value) {
        $tree[$key]->children[$key2] =  $value; // 赋值属性
        $tree[$key]->children[$key2]->children =  [];
      }
    }

    return $tree; // 返回tree
  }
}
