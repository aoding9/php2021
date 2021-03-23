<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

//禁用组件
//Encore\Admin\Form::forget(['map', 'editor']);

// 扩展列功能
// 方式一:简单版
use Encore\Admin\Grid\Column;

Column::extend('color2', function ($value, $color) {
    return "<span style='color: $color'>$value</span>";
});

// 方式二:定义扩展类,并注册到 bootstrap.php
// use Encore\Admin\Grid\Column;
use App\Admin\Extensions\Popover;

Column::extend('popover', Popover::class);

//  注册WangEditor富文本编辑器
use App\Admin\Extensions\WangEditor;
use Encore\Admin\Form;

Form::extend('editor', WangEditor::class);

// 注册show detail扩展类
use Encore\Admin\Show;
use App\Admin\Extensions\Show\UnSerialize;

Show::extend('unserialize', UnSerialize::class);

//  自定义头部导航
use Encore\Admin\Facades\Admin;

Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {

//    $navbar->left('html...');
    $navbar->left(view('search-bar'));
//    $navbar->right('html...');
    $navbar->right(new \App\Admin\Extensions\Nav\Links());

});
