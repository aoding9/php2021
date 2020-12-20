<pre>
1 最简单的错误处理：trigger_error()函数，但不会阻止系统报错
2 php提供了一种用户处理错误的机制，将自定义的错误处理函数添加到系统错误处理句柄中，发生错误时回调该函数进行对应处理
  set_error_handler用法： 
  set_error_handler( callable $error_handler[, int $error_types = E_ALL | E_STRICT] ) : mixed
  参数一：$error_handler  传入的回调函数有五个实参可接收
  handler( int $errno, string $errstr[, string $errfile[, int $errline[, array $errcontext]]] ) : bool
  $errno 错误级别 是一个integer类型  必须参数
  $errstr 错误信息 string类型   必须参数
  $errfile 错误的文件 
  $errline 错误的行数
  $errcontext 包含错误所处作用域内所有变量的数组array php7.2.0后被废除，不推荐使用

  参数二：$error_types
  指定错误类型掩码，可以屏蔽某些错误触发error_handler

  如果函数返回 FALSE，标准错误处理处理程序将会继续调用。 返回true则不会继续调用标准错误处理程序。

  题外话：句柄是啥？
  句柄：handle，有操作控制之意，是一种中间媒介，在代码中，则是一种数字标记，通过句柄可以访问与之对应的对象，类似于指针，但是不会暴露该对象真实地址
  例子：你要找李华，让他帮你买一包薯片，指针就是李华此时的所在地，句柄就是李华的手机号，李华可能在超市买东西，也可能在街上溜达，所以你很难知道他此时具体在哪，不过你可以给他打电话，通过无线电建立了一个快速通道，直接把要做的事情告诉李华。

  “句柄（handle），有两种解释
  第一种解释：句柄是一种特殊的智能指针 。当一个应用程序要引用其他系统（如数据库、操作系统）所管理的内存块或对象时，就要使用句柄。
  第二种解释：整个Windows编程的基础。
  句柄是Windows用来标识被应用程序所建立或使用的对象的唯一整数，WINDOWS使用各种各样的句柄标识诸如应用程序实例，窗口，控制，位图，GDI对象等等。”

  https://www.php.cn/faq/418211.html
  https://www.zhihu.com/question/27656256
  https://blog.csdn.net/qq_39618306/article/details/78996840
  指针和句柄的区别：https://blog.csdn.net/yipiankongbai/article/details/17404247
  句柄是指针的指针，由于所管理对象的内存地址会发生改变，为了更好管理他们，就用句柄作为中介。使用时不需要关心对象实际所在地址，只要根据句柄来找中介，通过中介访问对象。
  

</pre>


<?php
function errHandler($errno, $errstr, $errfile, $errline)
{
  // 判断错误是否属于系统配置中所要显示的错误级别
  // error_reporting()没有参数，表示获取系统错误处理对应级别
  if (!(error_reporting() & $errno)) {
    return false;  //  返回false，表示继续调用标准错误处理程序
  }
  // 根据不同类型进行处理
  switch ($errno) {
    case E_ERROR:
    case E_USER_ERROR:
      echo 'fatal error in file' . $errfile . 'on line' . $errline.'<br>';
      echo 'error info:' . $errstr;
      break;
    case E_WARNING:
    case E_USER_WARNING:
      echo 'warning in file' . $errfile . 'on line' . $errline.'<br>';
      echo 'error info:' . $errstr;
      break;
    case E_NOTICE:
    case E_USER_NOTICE:
      echo 'notice in file' . $errfile . 'on line' . $errline.'<br>';
      echo 'error info:' . $errstr;
      break;
  }
  return true;  //  返回true 表示阻止系统标准错误处理程序执行
}

echo $a;  // 标准的错误处理

// 将自定义错误处理函数添加到系统错误处理句柄中
set_error_handler('errHandler');

echo $a;  // 自定义的错误处理
