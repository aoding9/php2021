<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
  composer require barryvdh/laravel-ide-helper=2.4.0
  Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class
  php artisan vendor:publish --provider="Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider" --tag=config
  php artisan ide-helper:generate - 为 Facades 生成注释
  php artisan ide-helper:models - 为数据模型生成注释
  php artisan ide-helper:meta - 生成 PhpStorm Meta file

  */

Route::group(['prefix' => 'admin/public'], function () {
  Route::get('login', 'Admin\PublicController@login')->name('login');
  Route::post('check', 'Admin\PublicController@check')->name('check');
  Route::get('logout', 'Admin\PublicController@logout')->name('logout');
});


Route::group(['prefix'=>'admin','middleware'=>['auth:admin','checkRbac']], function () {
  Route::get('index/index', 'Admin\IndexController@index')->name('index');
  Route::get('index/welcome', 'Admin\IndexController@welcome')->name('welcome');

  // 管理员管理
  Route::get('manager/index', 'Admin\ManagerController@index')->name('manager_index');

  // 权限管理
  Route::get('auth/index','Admin\AuthController@index')->name('auth_index');
  Route::any('auth/add','Admin\AuthController@add')->name('auth_add');
  
  // 角色管理
  Route::get('role/index','Admin\RoleController@index')->name('role_index');
  Route::any('role/assign','Admin\RoleController@assign')->name('role_assign');
  
  // 会员管理
  Route::get('member/index','Admin\MemberController@index')->name('member_index');
  Route::any('member/add','Admin\MemberController@add')->name('member_add');
  Route::get('member/getareabyid','Admin\MemberController@getAreaById')->name('member_getAreaById'); // ajax地区四级联动
  
  // 头像上传
  Route::post('uploader/webuploader','Admin\UploaderController@webuploader')->name('webuploader'); // 文件上传
  Route::post('uploader/qiniu','Admin\UploaderController@qiniu')->name('qiniu'); // 七牛文件上传
  
  // 专业列表和专业分类
  Route::get('protype/index','Admin\ProtypeController@index')->name('protype_index'); // 专业分类
  Route::get('profession/index','Admin\ProfessionController@index')->name('profession_index'); // 专业分类

});


