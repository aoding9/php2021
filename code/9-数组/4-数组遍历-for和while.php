<?php

/**
 * for遍历数组
 * 1.获取数组长度：count(arr);
 * 2.一般要求是索引数组，而且下标有规律
 * 3.优化：数组长度获取可以写在初始化里，不写在边界判断里
 */
$arr = [1, 2, 3, 4, 5, 6, 7];
for ($i = 0, $len = count($arr); $i < $len; $i++) {
  echo $i . '=>' . $arr[$i] . '<br>';
}

echo '<hr>';

/**
 * while配合each和list遍历数组
 * each()函数：指针操作，获取指针对应的键和值，然后下移指针，直到取不到值，返回false，如果取到值，则返回数组，其中包括四个值：[0=>键,1=>值,key=>键,value=>值]，四个值主要是可以让索引和关系数组都可以拿到信息
 * list(变量)=arr 结构：依次从数组中取值，赋值给括号中的变量，有几个变量就取几次，取值的数组必须为索引从0开始，且索引连续的数组，否则报错
 */

echo '<pre>';

/** 
 * each用法
 *注意，each在php7.2后被抛弃，写的时候安装的8.0，换成7.1可以用，另外7.0不识别中文php文件
 */
$people = array("Bill", "Steve", "Mark", "David");
print_r(each($people));

/**
 * list用法
 */
list($a, $b, $c, $d) = $pepole;
// list(1=>$a,$b,$c,$d)=$pepole;  // 错误 必须0开头
// list($a,$b,3=>$c,$d)=$pepole;  // 错误 必须连续
echo $a, $b, $c, $d;
echo '<hr>';


/**
 * 三个配合使用
 * each的0总是对应key 1总是对应value
 * 当取不到值时返回false，list的结果也为false
 */
$people2 = array("Bill", "Steve", "Mark", "David");

while (list($key, $value) = each($people2)) {
  echo $key . '=>' . $value . "\n";
}
