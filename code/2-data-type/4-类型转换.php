<?php
$a = 'abc11';
$b = '1.1.1abc';

// 自动类型转换
// 布尔值true自动转为1
echo true + 1;

// 手动类型转换
// php7为了提高性能，移除了一部分自动类型转换，现在这么加不会自动转了
// echo $a + $b;
// 变量前面加括号，里面写要转换的类型
echo (float)$a + (float)$b, '<br>';
echo intval($a) + intval($b), '<br>';
// 结果为1.1和1，$a转成0,$b转成了1以及1.1


// 判断数据类型
// 布尔类型不能用echo查看，可以用var_dump输出类型和值
// is_datatype 可以判断是否为某个类型，结果为布尔值
var_dump(is_int($a));
var_dump(is_string($b));
// gettype获取变量的类型
echo gettype($a), '<br>';
// settype设置变量的类型，如果设置成功会返回true
var_dump(settype($b, 'int'));
echo '<br>', gettype($b), $b;

// 强制转换和settype的区别
// 强制转换是对数据复制后转换，不影响原来的数据，settype是直接对原数据转换
