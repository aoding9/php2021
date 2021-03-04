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
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'], function () {
  Route::get('index/index', 'Admin\IndexController@index')->name('index');
  Route::get('index/welcome', 'Admin\IndexController@welcome')->name('welcome');
});
