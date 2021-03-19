<?php

use Illuminate\Routing\Router;

Admin::routes();


Route::group([
  'prefix'        => config('admin.route.prefix'),
  'namespace'     => config('admin.route.namespace'),
  'middleware'    => config('admin.route.middleware'),
  'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

  $router->get('/', 'HomeController@index')->name('home');
  $router->get('index2', 'MovieController@index2');


  $router->resource('users', UserController::class);

  $router->resource('movies', MovieController::class);
  $router->resource('profiles', ProfileController::class);

  $router->resource('posts', PostController::class);
  $router->resource('comments', CommentController::class);

    //   批量改文章接口
  $router->post('posts/release', 'PostController@release');

//   $router->get('movies/test1', 'MovieController@index')->name('test1');
});
