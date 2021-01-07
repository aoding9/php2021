<pre>
<?php
/**
 * 1.排序函数（字符类型会按照ASCII码进行比较）
 * 会改变原数组，返回值都是布尔值，表示操作是否成功
 * sort() 对数组顺序排序，键名重排  （从小到大）
 * rsort() 数组逆序排序，键名重排
 * asort() 数组顺序排序，保留键名
 * arsort() 数组逆序排序，保留键名
 * ksort()  数组按照键名排序  对应的还有krsort()
 * shuffle() 随机打乱数组元素
 */
echo "sort:\n";
$arr1 = [1, 5, 6, 2, 3];
var_dump(sort($arr1)); // 布尔值，表示是否成功
print_r($arr1);  // 顺序排序 键名重置

echo "<hr>rsort:\n";
$arr2 = [1, 5, 6, 2, 3];
var_dump(rsort($arr2)); 
print_r($arr2); // 逆序排序 键名重置


echo "<hr>asort:\n";
$arr3 = [1, 5, 6, 2, 3];
var_dump(asort($arr3)); 
print_r($arr3); // 键名保留 顺序

echo "<hr>arsort:\n";
$arr4 = [1, 5, 6, 2, 3];
var_dump(arsort($arr4)); 
print_r($arr4); // 键名保留 逆序

echo "<hr>ksort:\n";
$arr5 = ['z'=>1, 'b'=>5,2=> 6, 5=>2,'c'=> 3];
var_dump(ksort($arr5)); 
print_r($arr5); // 随机打乱数组 键名重置

echo "<hr>shuffle:\n";
$arr6 = [1, 5, 6, 2, 3];
var_dump(shuffle($arr6)); 
print_r($arr6); // 随机打乱数组 键名重置



