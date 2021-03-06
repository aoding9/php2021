<?php
// 三元运算 三目运算 条件运算
// 表达式1?表达式2:表达式3
// 如果表达式1为true，则执行表达2，否则执行表达式3
// 可以嵌套
echo '1>0?';
echo 1 > 0 ? 'yes' : 'no';

// 自操作运算符
// ++ -- 自增自减，可以前置或者后置
// 需要注意的是，++$a和$a++有一定差异，前置是先自增，再参与其他运算，后置自操作先把自己的值保留一份给别人去参与运算，自己再改变，可以理解为先运算后自操作
$a = 1;
$b = $a++; // a先赋值给b,然后再加1变成2 ，b为1

$a = 1;
$c = ++$a; // a先加1，然后赋值给c， c为2
echo $a, $b, $c;

// 衍生
// += -= *= /= %= 类似自操作，左边与右边先运算，再赋值给左边