<?php
// php artisan make:controller TestController       创建控制器
// php artisan make:controller Admin/TestController 创建分目录的控制器

namespace App\Http\Controllers; // 声明命名空间

// 如果和基础控制器命名空间相同,则不需要引入其命名空间

// Illuminate 装饰,装修  [ɪˈluːmɪneɪt]
// Request类里面里面是和http请求相关的东西
use Illuminate\Http\Request; 

// laravel 6.x 版本已经取消 Input Facades 了 ,新版的直接用Request门面类。
// Request::get()

// 5.x版本使用input门面
// use Illuminate\Support\Facades\Input;
// 由于用到比较多,所以定义类别名
// 修改config/app.php 中的 aliases数组,添加如下一行
// aliases 别名 [ˈeɪliəsɪz]
// 'Input' => Illuminate\Support\Facades\Input::class,
// use Input;

class TestController extends Controller
{
  // 控制器路由: 推荐
  // 控制器名@方法
  public function test1()
  {
    phpinfo();
  }

  public function test1_2()
  {
    return '我是test1_2';
  }

  // 使用依赖注入获取请求参数
  // 后面则是路由参数,可以不写,这里只是测试下
  public function test2(Request $request,$id=1){
    // request使用方式和旧版的Facades\Input 差不多

    dump($id); // 路由传参,他和$request是分开的
    dump($request->input('name')); // 都可以
    dump($request->get('name')); // 接收get参数
    dump($request->get('gender','男')); // 设置默认值
    dump($request->all()); // 接收所有
    dump($request->only(['age'])); // 接收指定数组的参数,  适合从参数多的取很少
    dump($request->except(['age'])); // 返回排除指定参数后的数组,  适合从多的参数取很多
    dump($request->has('id')); // 判断是否有这个参数,可以看到$request参数不包含路由参数
    // http://hello.com/test2?name=123&age=123
    /*
    1
    "123"
    "123"
    "男"
    array:2 [▼
      "name" => "123"
      "age" => "123"
    ]
    array:1 [▼
      "age" => "123"
    ]
    array:1 [▼
      "name" => "123"
    ]
    false
    */
    // dd('11'); // 也是输出,会阻止继续执行,用于调试
  }
}
