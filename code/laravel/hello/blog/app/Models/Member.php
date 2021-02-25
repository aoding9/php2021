<?php

namespace App\Models;

// HasFactory生成的模型具有laravel8新特性，因此可以直接在控制器中使用模型工厂
// https://www.wjcms.net/archives/laravel8%E6%9B%B4%E6%96%B0%E4%B9%8B%E6%A8%A1%E5%9E%8B%E7%9B%AE%E5%BD%95%E5%8F%8A%E6%A8%A1%E5%9E%8B%E5%B7%A5%E5%8E%82%E7%B1%BB%E8%B0%83%E6%95%B4
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// 继承基础模型类
class Member extends Model
{
  use HasFactory;
  /* 模型约定 https://learnku.com/docs/laravel/8.x/eloquent/9406#eloquent-model-conventions
     1 protected $table  一般必须
        指定数据表名，默认是关联模型名的复数形式的表，例如这里关联members表，如果表名不对，就要自己指定
     2 protected $primayKey 
        指定主键名称，如果使用AR模式find方法可能要设置 ( Model::find(n) )，另外主键字段不是id时也需要指定主键
     3 public $timestamps 
        默认true 为false表示自动更新表中的created_at和updated_at（datetime类型）字段，没有这两个字段就指定false
     4 protected $fillable
        指定使用模型插入数据时，允许的字段数组，使用create/save方法时建议加上这个
  */
  protected $table = 'member';
  protected $primayKey = 'id';
  public $timestamps = false;
  protected $fillable = ['name','age','email'];
}
