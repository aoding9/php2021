<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;
    protected $table='keyword';
    public $timestamps=false;
      /*
      多对多: 文章关联关键词(文章主)
      $this->belongsToMany('被关联模型的命名空间','关联关系表名','主表关系键','从表关系键')
      多对多的主要查询的模型中都要加,类似于多个一对多,但是写法不一样
    */
    public function relate_article()
    {
      return $this->belongsToMany('\App\Models\Article','relation','keyword_id','article_id');
    }
}
