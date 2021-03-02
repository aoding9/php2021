<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table='article';
    public $timestamps =false;

    // 定义关联方法
    // return $this->hasOne('被关联模型的命名空间','被关联模型的关系字段','本模型中的关系字段')
    public function relate_author(){
      return $this->hasOne('\App\Models\Author','id','author_id');
    }
}
