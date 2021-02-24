<?php

use Illuminate\Support\Facades\Route;

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

// Route类静态调用方法,第一个参数是url,第二个参数是回调函数 或者 字符串的控制器方法
// url的第一个/可以省略(如果只有斜杠则不可以省略)
Route::get('/', function () {
    // echo '回调函数里面可以return 也可以执行其他的代码';
    return view('welcome');
});

# 限制请求类型:get post any(全部可以访问) macth(指定几个类型都可以访问)
# 用get访问时报错:The GET method is not supported for this route. Supported methods: POST.
Route::post('home',function(){
  return date('Y-m-d');
});

// 路由参数,{id}或者{id?} 分别表示必传参数和可选参数,用回调函数接收路由参数,可选参数需要在回调函数中给定参数默认值
Route::get('home2/{id}', function ($id1) {
  return "$id1";
});
Route::get('home3/{id?}', function ($id=0) {
  return "$id";
});

// 传统的方式:/home4?id=123
Route::get('home4',function(){
  return $_GET['id'];
});

// 路由别名: 调用路由对象的name方法,别名要唯一
// 在视图里面调用时,写成route('别名')
Route::get('/home1', function () {
  return view('welcome');
}) -> name('bieming');

// 用artisan查看路由列表和别名
// php artisan route:list


// 路由组允许你在大量路由之间共享路由属性，例如中间件，而不需要为每个路由单独定义这些属性。
Route::group(
  ['prefix'=>'admin',],
  // ['prefix'=>'admin','middleware'=>'xxxx'],
  function () {
    Route::get('login',function(){
      // 匹配/admin/login
      return '/admin/login';
    });
    Route::get('user/add',function(){
      // 匹配/admin/user/add
      return '/admin/user/add';
    });
  }
);

// 路由前缀 写法2
Route::prefix('admin2')->group(
  function () {
    Route::get('edit', function () {
      return '/admin/edit';
    });
    Route::get('add', function () {
      return '/admin/add';
    });
  }
);


// 控制器路由
// 6-7的写法: 控制器名@方法
Route::get('test1','TestController@test1');
// 这里的这里是命名空间,所以用\反斜杠
Route::get('test1_2','Admin\TestController@test1_2');

// 注:laravel8改变了之前的写法,Providers不再带有命名空间属性:
// 如果要使用旧写法:去app/Providers/RouteServiceProvider中,将protected $namespace = 'App\\Http\\Controllers';去掉注释即可

// 新版写法: 手动引入控制器的命名空间
// 更新说明: https://learnku.com/docs/laravel/8.x/releases/9351#d99737
use App\Http\Controllers\TestController;
Route::get('/test1_2', [TestController::class, 'test1_2']);

// 感觉旧版写起来方便点,先用旧版吧


// 获取请求参数
Route::get('test2/{id?}','TestController@test2');

