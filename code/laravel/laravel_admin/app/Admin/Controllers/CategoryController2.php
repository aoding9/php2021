<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Encore\Admin\Tree;
use Encore\Admin\Layout\Content;

class CategoryController2 extends Controller
{
    public function index(Content $content)
    {
        $tree = new Tree(new Category);
        dd($tree);

        return $content
            ->header('树状模型')
            ->body($tree);
    }
}
