<?php
// 可变函数

function add()
{
  echo 1 + 2;
}
// 用变量保存函数的名字
$myFunc = 'add';
// 然后调用
$myFunc();
echo '<hr>';


// 回调函数
// 一个函数内调用另一个函数，并且这个函数是通过参数传进来的可变函数。
function callBack($func1, $func2)
{
  // 使用callBack时，自动调用传进来的函数，由于代码顺序执行，当回调函数放在最前面或者最后时，就可以通过回调函数是否执行，判断外部函数执行到哪一行了。
  $a = $func1(); // func1一定会在func2前面执行，并且我们可以得到他的返回值，交给第二个回调函数去处理
  // 另外，定义时如果将局部变量传递给可变函数，那么回调函数内部就可以使用这个外部函数的变量了，从而对函数结果进行自定义的处理
  $b = 1;
  $result = $func2($a, $b);
  return $result;  // 返回结果
}
function start()
{
  echo '开始执行了<hr>';
  return 3;  // 返回3，交给回调函数处理
}
// 需要形参接收回调函数传过来的实参
function ended($a, $b)
{
  echo '结束执行了<hr>';
  return $a + $b;
}
$start = 'start';
$ended = 'ended';

// 传变量名进去，或者变量名保存给变量再传，或者用变量保存匿名函数，然后传变量也行
echo callBack('start','ended');
// echo callBack($start, $ended);
