<?php
define('A', 123);
function add(&$a)
{
  echo $a += 1; // 11
}
// 错误用法：对非变量取地址 add(A);
$c = 10;
add($c);
echo '<br>';
echo $c; // 11