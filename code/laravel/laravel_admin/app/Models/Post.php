<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
//    声明json1是json格式的字段
    protected $casts = [
        'json1' => 'json',
    ];

    // public function setCoverAttribute($cover=[])
    // {
    //     if (is_array($cover)) {
    //         $this->attributes['cover'] = json_encode($cover);
    //     }
    // }

    // public function getCoverAttribute($cover)
    // {
    //     // dump(json_decode($cover, true));
    //     return json_decode($cover, true);
    // }
}
