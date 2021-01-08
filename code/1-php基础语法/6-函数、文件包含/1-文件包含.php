<?php
// 使用四个关键字：include include_once require require_once
// 带once的表示只包含一次，系统自动判断是否重复包含


// 向上包含，使用上面包含文件中的内容
  include '1-aa.php';
  // 另一种写法
  // include(文件路径)
  echo $a;
$b = 2;
  // 向下包含，先把自己的内容给下面包含的文件使用
  require '1-bb.php';
  

  // 文件加载原理
  // 系统将被包含内容嵌入到包含关键字所在位置，类似于复制过来了（魔术常量例外，仍然是原来文件的信息）
  // 但是和直接写一起有区别：被包含文件单独编译，加载到内存中
  // php代码执行过程：读取php文件 >> php编译为字节码(opcode) >> zend engine解析opcode，按照字节码进行逻辑运算 >> 转换为html代码

  // include和require区别
  // include包含文件出错，错误级别为Warning，不影响后面继续执行
  include '1-cc.php';
  // require包含文件出错，错误级别为error，后面代码不会执行
  require '1-cc.php';

  // 不过我这个都是报的warning，可能是新版本或者配置不同导致的

