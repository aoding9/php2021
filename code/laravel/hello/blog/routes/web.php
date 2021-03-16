<?php

use App\Http\Controllers\GateController;
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
Route::get('/test1_2', [App\Http\Controllers\TestController::class, 'test1_2']);

// 感觉旧版写起来方便点,先用旧版吧


// 获取请求参数
Route::get('test2/{id?}','TestController@test2');


// DB类增删改查
Route::get('add','TestController@add');
Route::get('delete','TestController@delete');
Route::get('modify','TestController@modify');
Route::get('select','TestController@select');


// 视图 blade模板语法
Route::get('test3','TestController@test3');
Route::get('test4','TestController@test4');
Route::get('test5','TestController@test5');

// CSRF保护
Route::get('test6','TestController@test6');
Route::post('test7','TestController@test7')->name('t7');

// AR模式 增删改查
Route::any('mod_add','TestController@mod_add');
Route::get('mod_del','TestController@mod_del');
Route::get('mod_mod','TestController@mod_mod');
Route::get('mod_select','TestController@mod_select');

// 提交测试数据的表单
Route::get('test8','TestController@test8');
// 表单验证，验证器的使用
// 跳转响应
Route::post('test9','TestController@test9');

// 分页
Route::get('test10','TestController@test10');

// json响应
Route::get('test11','TestController@test11');

// session的使用
Route::get('test12','TestController@test12');

// 缓存操作
Route::get('test13','TestController@test13');

// 联表操作
Route::get('test14','TestController@test14');

// 关联模型
// 一对一
Route::get('test15','TestController@test15');
// 一对多
Route::get('test16','TestController@test16');
// 多对多
Route::get('test17','TestController@test17');



// 权限
use App\Http\Controllers\AuthController;
use App\Models\Member;

Route::get('auth/index/{id?}/{a?}',[AuthController::class,'index'])->middleware('rbac')->name(Member::first()->email);
