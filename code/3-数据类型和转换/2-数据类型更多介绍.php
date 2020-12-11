<?php
// php有四种整形进制定义
// 十进制
$a1 = 110;
// 二进制 0b开头
$a2 = 0b110;
// 八进制 0开头
$a3 = 0110;
// 十六进制 0x开头
$a4 = 0x110;

echo $a1 . '<br>' . $a2 . '<br>' . $a3 . '<br>' . $a4 . '<br>';

// 进制转换函数
// 前三个字母是当前数据的进制，后三个字母是目标进制
// 十进制转二进制
Decbin($a1);
// 十进制转八进制
Decoct($a1);
// 十进制转十六进制
dechex($a1);


// 浮点型
// 二进制码第一位是正负号，紧跟的7位是科学计数法的中10的指数，后面的是因数，二者乘积就是存储的数值

$f1 = 1.23;
$f2 = 1.23e10;
// 由于因数为不断除以2得到，位数超过精度时舍弃尾部，所以结果可能不准确
$f4 = 2.1;
$f5 = 0.7;
var_dump($f4 / 3 === $f5);
// 当整形超过存储的范围后会用浮点型存储
$f3 = PHP_INT_MAX;
echo gettype($f3), '<br>';
$f3 += 1;
var_dump($f1, $f2, $f3);


// 布尔类型
// 真、假   true false
// 其他类型转布尔类型时，有些地方需要注意
// empty() 判断数据的值是否为“空”，不是NULL，为“空”返回true，否则false，空字符串空数组都是true
// isset() 检测变量是否已设置并且非 NULL，存在变量返回true，否则false

/*            empty()    isset()
$x;           true       false
$x=null;      true       false
$x=undefined  true       false
上面三个isset为false，其他一般为true

$x=0;         true
$x="0";       true
$x=false;     true
$x="false";   false
布尔值false为empty为true，但是字符串“false”为false
数字0和字符串0都为true


*/

// 具体的看php手册