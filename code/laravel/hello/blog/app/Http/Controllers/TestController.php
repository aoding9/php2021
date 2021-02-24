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

/* 5.x版本使用input门面
  门面是介于类实例化与没实例化中间的一个状态,是类的一个接口实现,可以不实例化类就静态调用类中的方法
  use Illuminate\Support\Facades\Input;
  由于用到比较多,所以定义类别名
  修改config/app.php 中的 aliases数组,添加如下一行
  aliases 别名 [ˈeɪliəsɪz]
  'Input' => Illuminate\Support\Facades\Input::class,
  use Input;
*/

/* 
  别名引入DB类
*/
use Illuminate\Support\Facades\DB;
// use DB;

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
  public function test2(Request $request, $id = 1)
  {
    // request使用方式和旧版的Facades\Input 差不多

    dump($id); // 路由传参,他和$request是分开的
    dump($request->input('name')); // 都可以
    dump($request->get('name')); // 接收get参数
    dump($request->get('gender', '男')); // 设置默认值
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


  /* 
    DB类增删改查,不推荐这个
    官方文档: https://learnku.com/docs/laravel/8.x/database/9400#running-queries
    增:
    1:insert(数组) 可一次添加一条或多条,返回布尔值
    2: insertGetId(一维数组) 添加一条数据,返回自增id
    数组要求为关系数组,键就是数据表字段名
    语法:DB::table('表名')->insert(['name'=>'bob']);
  */
  public function add()
  {
    // 定义数据
    $data = [
      'name' => '张三',
      'age' => '22',
      'email' => 'zhangsan@qq.com'
    ];
    // 增加
    // dump(DB::table('member')->insert($data));
    dump(DB::table('member')->insertGetId($data));
  }

  /*
    修改 
    1 update() 修改记录中的字段,返回受影响的行数
    2 increment和decrement 修改数字字段的数值,递增/递减

    配合查询构造器进行食用 效果更佳
    文档: https://learnku.com/docs/laravel/8.x/queries/9401
    通过DB门面的table方法开启查询,table返回查询构造器实例,在查询上链式调用更多的约束，最后使用 get 方法获取结果
    例子: where() / orWhere()  三个参数: 字段名,比较符,值  只写2个则比较符为=号  orWhere表示or连接查询条件
  */
  public function modify()
  {
    $data = ['name' => '王二'];
    dump(DB::table('member')->where('id', '=', '1')->update($data));
    dump(DB::table('member')->where('id', '=', '2')->increment('age', 2)); // 递增,要求字段为数字,默认步长为1,可以指定
  }

  /* 
    查询
    1 get() 方法返回一个包含 Illuminate\Support\Collection 实例的结果，其中每一条记录都是 PHP stdClass 对象的一个实例。你可以通过对象属性的方式来获取每个字段的值
    2 first() 如果只从数据表中取一行数据，可以用 first 方法。该方法返回一个 stdClass 对象,取第一条

    // 场景选择: first=> 登录验证/详情页面/修改功能   get=>列表页面/设计接口
  */
  public function select()
  {
    $db = DB::table('member');
    // 1 取出基本数据
    /*
      $data = $db->get();
      foreach ($data as $key => $value) {
        // dump($value); // 是个对象
        echo $value->name.'<br>';
      } 
    */
    // 避免受到ORM AR模式影响注释上面的代码

    // 约束查询 取出id<3的数据
    // $data = $db->where('id','<','3')->get();


    // 2 取出单行数据
    // $data = $db->first();
    
    // 3 获取某个具体的值(1个字段的值)
    // $data = $db->where('id','1')->value('name');
    
    // 4 获取某些字段的值(多字段的值)
    // $data = $db->select('id','name')->get();
    // $data = $db->select('name as 姓名')->get(); // 字段别名
    // $data = $db->select(DB::raw('name,age'))->get(); //DB::raw()表示不解析字段,直接拼接到sql语句
    $data = $db->select(DB::raw('count(*)'))->get(); // raw用法

    
    dump($data);
  }

  public function delete()
  {

  }
}
