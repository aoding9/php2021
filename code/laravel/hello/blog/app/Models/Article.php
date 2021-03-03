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
    /*
      一对一: 文章关联作者
      $this->hasOne('被关联模型的命名空间','被关联模型的关系字段','本模型中的关系字段')
    */
    public function relate_author(){
      return $this->hasOne('\App\Models\Author','id','author_id');
    }

    /*
      一对多: 文章关联评论
      $this->hasMany('被关联模型的命名空间','被关联模型的关系字段','本模型中的关系字段')
    */
    public function relate_comment()
    {
      return $this->hasMany('\App\Models\Comment','article_id','id');
    }

     /*
      多对多: 文章关联关键词(文章主)
      $this->belongsToMany('被关联模型的命名空间','关联关系表名','主表关系键','从表关系键')
    */
    public function relate_keyword()
    {
      return $this->belongsToMany('\App\Models\Keyword','relation','article_id','keyword_id');
    }
}
