<?php
// 输出相关
print('print:输出字符串');
echo '<br>';
echo print 'print本质是结构，可以不带括号，返回值为1。<br>';
echo '<br>';
print_r('print_r:以人类易读的格式显示一个变量的信息。 ');
echo '<hr>';

// 时间相关
// 1.按指定格式，输出时间戳（从1970年格林威治时间开始计算的秒数）如果不指定时间，则默认当前时间戳。
// date( string $format[, int $timestamp] ) : string
echo date('Y 年 m 月 d 日 H:i:s');
echo '<br>';

// 2.time()  获取当前时间对应的时间戳
echo time();
echo '<br>';

// 3.microtime()  返回当前unix时间戳和微秒数
// microtime([ bool $get_as_float] ) : mixed
//   如果调用时不带可选参数，本函数以 "msec sec" 的格式返回一个字符串，其中 sec 是自 Unix 纪元（0:00:00 January 1,1970 GMT）起到现在的秒数，msec 是微秒部分。字符串的两部分都是以秒为单位返回的。 
// 如果给出了 get_as_float 参数并且其值等价于 TRUE，microtime() 将返回一个浮点数。 

echo microtime();
echo '<hr>';

// 4. strtotime()
// 本函数预期接受一个包含美国英语日期格式的字符串并尝试将其解析为 Unix 时间戳（自 January 1 1970 00:00:00 GMT 起的秒数），其值相对于 now 参数给出的时间，如果没有提供此参数则用系统当前时间。 
// strtotime( string $time[, int $now = time()] ) : int
echo strtotime('10 hours'); // 返回当前时间10小时之后的时间戳
echo '<hr>';

// 数学相关，看手册ba

// 函数相关
function add($a, $b)
{
  // 返回传入函数的参数中的某一个
  echo func_get_arg(1) . '<br>';  // 返回2
  // 以数组形式，返回传入函数的所有参数
  var_dump(func_get_args());  // 返回[1,2,3]
  echo '<br>';
  // 返回传入函数的参数数量
  echo func_num_args() . '<br>';  // 返回3
  return $a + $b;
}


// 判断函数内存中是否存在
var_dump(function_exists('add'));
echo '<br>';
// 利用短路运算，如果函数存在才执行
function_exists('add') && add(1, 2, 3);
