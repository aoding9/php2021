<?php

use App\Http\Resources\Users;
use App\Models\User;
use Illuminate\Routing\Router;

// 文件上传
Route::post('uploader/webuploader','App\Admin\Controllers\UploaderController@webuploader')->name('webuploader'); // 文件上传
Route::post('uploader/qiniu','App\Admin\Controllers\UploaderController@qiniu')->name('qiniu'); // 七牛文件上传


Admin::routes();


Route::group([
  'prefix'        => config('admin.route.prefix'),
  'namespace'     => config('admin.route.namespace'),
  'middleware'    => config('admin.route.middleware'),
  'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

  $router->get('/', 'HomeController@index')->name('home');
  $router->get('index2', 'MovieController@index2');
  $router->get('tree', 'CategoryController@index');



  $router->resource('users', UserController::class);

  $router->resource('movies', MovieController::class);
  $router->resource('profiles', ProfileController::class);

  $router->resource('posts', PostController::class);
  $router->resource('comments', CommentController::class);

    $router->resource('categories', CategoryController::class);

    //   批量改文章接口
  $router->post('posts/release', 'PostController@release');

  Route::get('api/users', function () {
    return new Users(User::all());
});
//   $router->get('movies/test1', 'MovieController@index')->name('test1');
});

