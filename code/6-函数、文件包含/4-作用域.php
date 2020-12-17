<?php
  $a =1; // 全局变量
  // =》被系统纳入超全局变量$GLOBALS['a']=1，但是必须通过数组方式使用
  function b(){



    // 函数内部无法使用全局变量$a;
    // echo $a;

    $b=2; // 局部变量
    echo $GLOBALS['a'];
  }
  // 全局空间无法使用局部变量$b
  // echo $b;
  echo $GLOBALS['a'];
  echo '<br>';

  // 如果要函数内使用函数外的变量，可以使用参数传值，如果要内部修改外部，还可以引用传值
  // 除此之外，php还提供了global关键字：在函数内部使用global声明的变量，不论全局还是局部都能访问
  // - 如果定义的变量名在全局已经存在，那么内部声明的变量会直接指向外部同名变量的内存空间
  // - 如果全局没有同名变量，那么global会自动在全局空间定一个同名全局变量
  // - 本质就是让内部和外部同名变量指向相同内存地址
  
  $g = 1;
  function g(){
    global $g;
    $g = 3; // 这里修改g,外面也被修改了
    global $g2; //外面没有g2，自动声明一个全局g2
    $g2=2;
  }
  g();
  echo $g;
  echo '<br>';
  echo $g2;

  // 一般不会这么用，而是用参数形式，或者常量（常量没有访问限制）