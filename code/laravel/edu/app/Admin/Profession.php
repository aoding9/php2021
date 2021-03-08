<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Profession
 *
 * @mixin \Eloquent
 */
class Profession extends Model
{
    protected $table ='profession';
    public function  protype(){
      return $this->hasOne('App\Admin\Protype','id','protype_id');
    }
}
