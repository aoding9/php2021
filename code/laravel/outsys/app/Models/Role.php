<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // use HasFactory;
    protected $table = 'role';
    public function auth (){
      return $this->belongsToMany('App\Models\Auth','role_auth','role_id','auth_id');
    }
}
