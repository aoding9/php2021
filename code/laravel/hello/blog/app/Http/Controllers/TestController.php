<?php
// php artisan make:controller TestController       创建控制器
// php artisan make:controller Admin/TestController 创建分目录的控制器

namespace App\Http\Controllers; // 声明命名空间
// 如果和基础控制器命名空间相同,则不需要引入其命名空间


// Illuminate 装饰,装修  [ɪˈluːmɪneɪt]
// Request类里面里面是和http请求相关的东西

// use App\Models\Member as ModelsMember;

use App\Models\Article;
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

// 别名引入DB类
// use DB;
use Illuminate\Support\Facades\DB;

// 别名引入缓存类
use Cache;

// 引入模型
use App\Models\Member;

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


  /*数据库 
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
    // $data = $db->select(DB::raw('count(*)'))->get(); // raw用法

    // 5 排序
    // asc是升序,desc是降序,默认升序,还有一个orderByDesc,也是降序
    // $data = $db->orderBy('age','desc')->get();

    // 6 分页
    // offset()偏移,可理解为跳过前几个,limit()限制记录数,二者搭配实现分页
    $data = $db->offset(2)->limit(5)->get(); // 跳过前2个,然后取5个



    dump($data);
  }

  public function delete()
  {
    // 删一行记录:delete(),必须加约束条件
    // 清空数据表:truncate() 
    // 一般不真的删除,用的软删除
    $db = DB::table('member');
    dump($db->where('id', '1')->delete());
    // dump($db->truncate());
  }
  // 另外还有执行原生sql语句的写法,不过用不上,需要的时候再看文档吧...


  // 视图
  public function test3()
  {
    // 一般视图会分目录管理,一个模块一个目录
    // 可以写.也可以/  视图可以.blade.php或者.php 前者优先级高


    // 测试: 视图后缀名优先级
    // return view('admin/test/test3');
    // return view('admin.test.test3');


    /* 给视图传递变量
      3种写法:推荐第一种
      1: view(模板,变量键值数组)
      2: view(模板)->with(变量键值数组)
      3: view(模板)->with(模板使用的变量名,值)->with(键,值)...
    */
    $data = time();
    // return view('admin.test.test3',$data);
    // return view('admin.test.test3')-with($data);
    // return view('admin.test.test3')-with('name','zhangsan')->with('age',20);

    // compact($a,$b,...) 打包数组
    // php原生函数，可以将多个变量转成一个数组，变量名为键，变量值为值，搭配view()很方便
    $data2 = '222';
    $data3 = '333';
    dump(compact('data', 'data2', 'data3'));
    /*
      array:3 [▼
        "data" => array:2 [▼
          "name" => "zhangsan"
          "age" => "20"
        ]
        "data2" => "222"
        "data3" => "333"
      ]
    */
    return view('admin.test.test3', compact('data'));
  }

  // blade模板 循环、分支语法
  public function test4()
  {
    $data = DB::table('member')->where('id', '<', '5')->get();

    $day = date('N');

    return view('admin.test.test4', compact('data', 'day'));
  }

  // 模板 继承、包含 语法
  public function test5()
  {
    return view('admin.test.children');
  }

  // CSRF保护
  // 展示表单
  public function test6()
  {
    return view('admin.test.test6');
  }
  // 处理提交
  public function test7()
  {
    return '成功';
  }

  /*
    模型操作
    AR模式(active record):
    Active Record(活动记录)，是一种领域模型模式，特点是一个模型类对应关系型数据库中的一个表，而模型类的一个实例对应表中的一行记录。记录中的字段对应实例的属性,字段名即属性名
    https://baike.baidu.com/item/Active%20Record/3106858?fr=aladdin
    
    ORM（Object Relational Mapping，简称ORM，或O/RM，或O/R mapping）:
    对象关系映射 是一种程序设计技术，用于实现面向对象编程语言里不同类型系统的数据之间的转换。从效果上说，它创建了一个可在编程语言里使用的“虚拟对象数据库”
    通过实例对象的方法，来操作关系型数据库，建立对象和关系的映射
    https://baike.baidu.com/item/%E5%AF%B9%E8%B1%A1%E5%85%B3%E7%B3%BB%E6%98%A0%E5%B0%84/311152?fromtitle=ORM&fromid=3583252&fr=aladdin

    eloquent
    美: ['eləkwənt] 
    英: ['eləkwənt] 
    adj.	雄辩的；有口才的；流利的；传神的
    网络	有说服力的；动人的；口才好的

    Laravel 的 Eloquent ORM ：https://learnku.com/docs/laravel/8.x/eloquent/9406
    模型创建：
    手动（看文档）或者artisan命令，可以分目录 Models/ModelName 不过拉若8默认就是在Models目录下，以前是在app目录下，如果删除了modles目录，则自动创建到app目录下
    php artisan make:model ModelName
    */

  // 测试AR模式的表单页面
  public function test8()
  {
    return view('admin.test.test8');
  }


  // AR模式保存数据
  // 依赖注入
  public function mod_add(Request $req)
  {
    // 1 不实例化，静态调用
    // $data = Member::get();
    // 2 实例化再调用
    // 自己定义的方法要用第二种，另外，第二种方法更加符合AR模式的映射关系
    // $model = new Member();
    // $data = $model->get();
    // dump($data);

    // 字段和属性建立映射关系
    // $model -> name ='王五';
    // $model -> age = 22;
    // $model -> email = 'asdasd@ass.cn';

    // 保存数据,即实例映射到记录
    // $res = $model-> save();

    // 高级写法???
    // create方法由于直接从请求参数里获取数据,必须定义模型的$fillable属性
    $res = Member::create($req->all());
    // 数据在对象的attributes属性中

    // DB类中的insert方法(以及其他方法)在模型中也可以用,但是,insert不受$fillable影响,插入时需要手动排除不插入数据表的字段,如csrftoken

    dump($res);
  }



  // AR模式查询操作
  public function mod_select(Request $req)
  {
    // 查一条: 获取主键为4的记录,返回模型实例对象
    $data = Member::find(5); // 主要这个,用的可能比较多

    // laravel中可以在最后用toArray方法,将对象的结果集转为数组
    // $data = Member::find(4)->toArray(); 

    // 查询多条:
    // 不加查询条件时,all()用法和get一样,默认查全部,也可以查指定字段
    // $data = Member::all(['name','age']); 
    // $data2 = Member::get(['name','age']);
    // dump($data==$data2); // true 数据是一样的

    // 区别:all前面不能加查询条件,只能查全部,get更灵活
    // $data = Member::where('id','1')->all(); // 报错,查询构造器类Eloquent\Builder里面没有all方法,他是Eloquent\Model类的静态方法,也就是要模型直接静态调用


    dump($data); // 数据在对象的attributes属性中
  }

  // AR模式修改数据
  public function mod_mod(Request $req)
  {
    // 需要先查记录,拿到记录对应的实例,通过实例的属性进行修改,然后保存
    $model = Member::find(5);
    // 通过模型实例的属性进行修改
    $model->email = 'hhhhhhh@h.hh';

    // 保存
    $res = $model->save();
    dump($res);  // true 返回执行是否成功

    // 通过update方法修改
    // dump(Member::where('id',6)->update(['age'=>100]));  // 1 返回受影响行数
  }

  // AR模式删除数据
  public function mod_del(Request $req)
  {
    // 需要先查记录,拿到记录对应的实例,通过实例的属性进行修改,然后保存
    $model = Member::find(7);
    // 保存
    $res = $model->delete();
    dump($res);  // true 返回执行是否成功

    // 通过update方法修改
    //  dump(Member::where('id',8)->delete());  // 1 返回受影响行数
  }


  //  表单验证，验证器的使用

  public function test9(Request $req)
  {
    /* 表单提交的一般步骤：
     1 接收并验证数据是否合法
     2 通过验证则写入数据表
     3 告知用户是是否成功
    */

    /* 验证器使用：
      1 依赖注入，获取请求对象
      2 调用实例的validate方法，传入$req和验证规则数组，具体哪些规则看文档，语法：'验证字段名'=>'规则1|规则2...'
      3 如果没通过，自动重定向到上一页，错误信息自动存到session里面
    */

    // min|max如果指定类型，自动切换字符长度或者数字大小，默认是字符长度
    $this->validate($req, [
      'name' => 'required|min:2|max:20|unique:member',
      'age' => 'required|integer|min:1|max:100',
      'email' => 'required|email',
      // captcha是验证码包的自带验证类型,另外翻译文件也要改
      'captcha' => 'required|captcha'
    ], [
      /* 如何显示成中文错误信息：
        1 在第三个参数自定义错误信息，比较繁琐
        2 packagist.org找语言包 composer require laravel-lang/lang，
          在/vendor/laravel-lang/lang/src里面，复制zh_CN到/resource/lang下面,
          然后修改config/app.php中的local属性:  'locale' => 'zh_CN', 
          如果有翻译不到的词，可以手动到语言包的validation.php中添加
      */
      'name.required' => '用户名不能为空',
      'age.required' => '年龄不能为空',
    ]);
    /* 验证码 第三方包
      使用说明:https://packagist.org/packages/mews/captcha
      1 composer require mews/captcha 下载安装
      2 config/app.php的providers添加 Mews\Captcha\CaptchaServiceProvider::class,
      3 config/app.php的aliases添加'Captcha' => Mews\Captcha\Facades\Captcha::class,
      4 php artisan vendor:publish创建默认配置文件,去config/captcha.php中修改length长度为4
      5 视图里面创建input框输入验证码,然后调用captcha_src()或captcha_img()显示验证码图片
      6 控制器接收,设置验证规则['captcha' => 'required|captcha']
      7 修改翻译文件,添加captcha元素(要添加2个)
    */

    /* 文件上传
      文档： https://learnku.com/docs/laravel/8.x/requests/9369#files
      1 判断文件是否存在.并且正常上传
      2 获取文件信息
      3 保存文件(移动临时文件并重命名)
      注意点: 
      0 如果用store存储文件，需要先配置文件系统：https://learnku.com/docs/laravel/8.x/filesystem/9392
      1 文件上传到public目录内,这样浏览器才能访问到(/public/statics/uploads)
      2 hasFile用于判断请求实例是否有文件,isValid是文件实例的验证方法,判断是否正常上传(根据文件上传错误码)
      3 extension获取文件实例的扩展名
    */
    // 为了测试，添加个头像字段 alter table member add column avatar varchar(100) after email;
    if ($req->hasFile('avatar') && $req->file('avatar')->isValid()) {
      // 重命名

      // 确定有这个文件的话,可以这么获取UploadedFile实例
      $name = sha1(time() . rand(100000, 999999)) . '.' . $req->avatar->extension();
      // dump($name);
      // 文件存储到指定目录 move(目录,文件名) 以入口文件为根的相对目录./
      $req->avatar->move('./statics/uploads', $name);
      // 这个是给前端展示的路径,要用/
      $path = '/statics/uploads/' . $name;
    }

    // 写入数据表,排除不需要的字段,然后把头像的路径添加进去
    $data = $req->except(['_token', 'avatar', 'captcha']);
    $data['avatar'] = $path ?? '';
    $res = Member::insert($data);


    // 返回结果
    // return $res ? 'OK' : 'Fail';
    /* 跳转响应
      1 return redirect(路由)->withErrors([]);  带错误信息,模板用$errors获取
      2 return redirect()->to(路由) 或者简写为return redirect(路由)  不带错误信息
    */
    if ($res) {
      return redirect('/');
    } else {
      return redirect('test8')->withErrors(['用户添加失败']);
    }
  }

  // 分页
  // https://learnku.com/docs/laravel/8.x/pagination/9402
  public function test10()
  {
    // $data = Member::all();

    $data = Member::paginate(1);

    return view('admin.test.test10', compact('data'));
  }

  /*json响应
    json_encode()需要手动指定header("Content-type:application/json"),否则是作为html返回
    而response()->json() 自动设置了header为json
  */
  public function test11()
  {
    $data = Member::all();
    return response()->json($data);
  }

  /*
    session的使用
    https://learnku.com/docs/laravel/8.x/session/9373
    1 配置 config/session.php
    2 使用session
    可以通过Request实例来使用,也可以用全局辅助函数session() 
      方法1:
        public function show(Request $request, $id)
        {
            $value = $request->session()->get('key');
        }

      方法2:
      // 获取 session 中的一条数据...
      $value = session('key');

      // 指定默认值
      $value = session('key', 'default');

      // 在 Session 中存储一条数据...
      session(['key' => 'value']);

      也可以使用session()->get()/put()/all()/has()/forget() 等方法
   */
  public function test12()
  {
    // 存入
    session(['name' => '呵呵呵']);
    session()->put('age', '20');
    // 获取
    dump(session('name'));
    dump(session()->get('age'));

    // 默认值
    dump(session('name1', '可以的'));
    // 动态默认值
    dump(session('name1', function () {
      return rand(1, 10);
    }));
    // 获取所有
    dump(session()->all());
    // 删除
    dump(session()->forget('name')); // null
    dump(session()->all());

    // 删除全部(框架会自动生成一些session数据,不用管他)
    dump(session()->flush('name'));  // null

    // 判断是否存在
    dump(session()->has('name')); // false

  }

  /*
    缓存操作
    https://learnku.com/docs/laravel/8.x/cache/9389
    1 配置文件 config/cache.php 默认为文件驱动
    2 使用:
      通过引入Cache Facade来使用
    2 常用方法
      Cache::put('key','value',$minutes)  有效期是分钟为单位的数字,如果键存在,则覆盖并刷新有效期
      Cache::add('key','value',$minutes)  只有键不存在才添加

      Cache::get()
      Cache::pull()

      Cache::forever() 持久化存储近似永久(有效期很长)
      Cache::forget()
      Cache::has()

      Cache::incremnent('key')  递增递减
      Cache::decrement('key')
  */
  public function test13()
  {
    // 查看storage/framework/cache下查看,是否多出data目录,下面出现/6a/e9目录(文件名前4位),最里面存着序列化后的缓存文件
    // 1614676054s:9:"嗯嗯呢";  前面是时间戳(代表缓存过期时间),s是字符串,9是字节数,缓存文件的名字就是键名进行编码的结果

    // 1 存入缓存
    Cache::put('name', '哈哈哈', 1);
    Cache::put('name', '嗯嗯呢', 60); // 覆盖了
    Cache::add('name', '呃呃呃', 60); // 不覆盖

    // 9999999999s:19:"几乎永久9999999"; 
    Cache::forever('class', '几乎永久9999999'); // 不覆盖

    // 2 获取
    dump(Cache::get('name'));
    dump(Cache::get('name2', '我是默认值'));
    dump(Cache::get('name2', function () {
      return '动态默认值';
    }));

    // 3 判断是否有
    dump(Cache::has('name'));
    dump(Cache::has('name22'));

    // 4 删除
    // pull是先获取,再删除,不存在则返回null,不删目录
    dump(Cache::pull('name'));

    // forget() /flush()和session一样,删一个和删全部,区别在于flush会同时删目录,前者不删
    dump(Cache::forget('age'));

    // dump(Cache::flush());  // 注释掉,避免影响下面的代码

    // 5 递增递减 
    // 计数器案例:(实际不会这么做,只是例子)
    Cache::add('count', '0', 99999);
    Cache::increment('count');
    dump('您是当前第' . Cache::get('count') . '访问者');


    // 6 获取并存储
    // 先尝试获取,如果没有获取到,就走回调函数,将函数返回值设置进缓存(可能是过期了,或者销毁了)
    /* 注意:这个是秒,上面是分钟
      $value = Cache::remember('users', $seconds, function () {
          return DB::table('users')->get();
      });
    */
    $data = Cache::remember('data', 10, function () {
      return Member::find(5);
    });
    dump($data->name);
  }

  /*
    联表操作
    
    https://learnku.com/docs/laravel/8.x/queries/9401#joins
    内连接 join('表名','字段1','条件符','字段2');
    外连接 leftJoin()/rightJoin()也是一样

    为了测试,先创建迁移文件php artisan make:migration create_article_table 和 php artisan make:migration create_author_table,执行迁移
    创建填充器 php artisan make:seeder ArticleAndAuthorTableSeeder 复制资料的填充数据,执行php artisan db:seed --class=ArticleAndAuthorTableSeeder
  */
  public function test14()
  {
    $data = DB::table('article as t1')
      ->select('t1.id', 't1.article_name as article_name', 't2.author_name as author_name')
      ->leftJoin('author as t2', 't1.author_id', '=', 't2.id')
      ->get();

    dump($data);
  }

  /*
    关联模型
    https://learnku.com/docs/laravel/8.x/eloquent-relationships/9407
    1 创建模型 php artisan make:model Article 和 php artisan make:model Author
    2 配置模型约定($table等)
    3 确定主和从模型,谁是主模模型,就在其中写关联方法
    */

    // 一对一关系
  public function test15()
  {
    $data = Article::all();
    foreach ($data as $key => $value) {
      // $value是模型对象
      // 通过定义的关联方法获取联表字段,要通过动态属性调用关联方法(读取属性时自动调用同名方法),然后再拿到里面的属性值
      echo '文章id:'.$value->id.'<br>';
      echo '文章名称:'.$value->article_name.'<br>';
      echo '文章作者:'.$value->relate_author->author_name.'<br>';
      echo '<hr>';
    }
  }
  public function test16()
  {
  }
  public function test17()
  {
  }
}
