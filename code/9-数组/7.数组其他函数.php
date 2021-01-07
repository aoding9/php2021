<pre>

<?php

/**
 * 3 其他函数
 * count() 返回数组元素数量
 * array_push() 往数组末尾追加一个元素 改变原数组 返回值是数组长度
 * array_pop() 删除数组末尾的一个元素 改变原数组，返回值是删除的元素值
 * array_unshift() 从数组首位添加一个元素
 * array_shift() 往数组首位删除一个元素
 * array_reverse() 翻转数组，返回新的数组
 * in_array() 判断元素是否在数组中存在，返回布尔值
 * array_keys() 返回元素的数组所有键名 返回键名的索引数组
 * array_values() 返回元素的数组所有值 返回值的索引数组
 */

 /**
  * 规律：追加元素返回数组长度，删除元素返回删除的元素值，两个之中长的是添加，短的是删除
  */
$arr = [3, 5, 2, 7, 8, 0];
echo "count:" . count($arr) . "\n";
echo '<hr>';

$arr = [3, 5, 2, 7, 8, 0];
echo "array_push:" . array_push($arr,'aa') . "\n";
print_r($arr);
echo '<hr>';

$arr = [3, 5, 2, 7, 8, 0];
echo "array_pop:" . array_pop($arr) . "\n";
print_r($arr);
echo '<hr>';


$arr = [3, 5, 2, 7, 8, 0];
echo "array_unshift:" . array_unshift($arr,'a') . "\n";
print_r($arr);
echo '<hr>';

$arr = [3, 5, 2, 7, 8, 0];
echo "array_shift:" . array_shift($arr) . "\n";
print_r($arr);
echo '<hr>';


$arr = [3, 5, 2, 7, 8, 0];
echo "array_reverse:" . array_reverse($arr) . "\n";
$newArr = array_reverse($arr);  //  返回新数组
print_r($arr);  // 翻转数组不会改变原数组
print_r($newArr);  // 用新数组接收返回值
echo '<hr>';


$arr = [3, 5, 2, 7, 8, 0];
echo "5 is in_array?:".in_array(5,$arr)."\n";
echo '注意：第一个参数是要找的元素，第二个是数组，和前面的不一样';
echo '<hr>';

$arr = [3, 5, 2, 7, 8, 0];
echo 'array_keys:';
print_r(array_keys($arr));
echo '<hr>';

$arr = [3, 5, 2, 7, 8, 0];
echo 'array_values:';
print_r(array_values($arr));
echo '<hr>';


