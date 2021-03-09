<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
  //
  protected $table = 'lesson';
  // 关联课时id 一个课时对应一个课程
  public function course()
  {
    return $this->hasOne('\App\Admin\Course', 'id', 'course_id');
  }
}
