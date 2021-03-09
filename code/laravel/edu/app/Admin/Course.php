<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = 'course';
  // 关联专业id 一个课程对应一个专业
  public function profession()
  {
    return $this->hasOne('\App\Admin\Profession', 'id', 'profession_id');
  }
}
