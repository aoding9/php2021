<?php
// 语法错误 变量名开头不能为数字
  // echo $1a; 

  // 运行时错误  虽然语法正确，但是没有定义$a
  // echo $a;

  // 逻辑错误  代码正常执行，但是由于写代码时逻辑有问题，得不到想要的结果
// 比如把++$a写成$a++导致结果不同
$a = 1;
// $b = ++$a *2; 
$b = $a++ *2;
echo $b;