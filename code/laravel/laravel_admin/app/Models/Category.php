<?php

namespace App\Models;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use ModelTree;
    protected $table = 'categories';
//    public function __construct(array $attributes = [])
//    {
//        parent::__construct($attributes);
//
//        $this->setParentColumn('pid');
//        $this->setOrderColumn('sort');
//        $this->setTitleColumn('name');
//    }
}
