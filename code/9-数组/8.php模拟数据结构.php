<pre>
<?php

/**
 * php模拟数据结构
 * 栈： 压栈，先进去的后出来，入口也是出口，瓶装水（假设水不会乱动），先倒进去的在最底下，喝的时候最后喝到
 * 队列： 先进去的先出来，一边进一边出，自来水
 */

/**
 * 栈
 * 如果出入口为前面：
 * array_unshift 进栈
 * array_shift 出栈
 * 
 * 如果出口为后面：
 * array_push 进栈
 * array_pop 出栈
 */
$arr = [];
// 进栈
echo "进栈\n";
array_unshift($arr, 1);
print_r($arr);
echo '<hr>';

array_unshift($arr, 2);
print_r($arr);
echo '<hr>';

array_unshift($arr, 3);
print_r($arr);
echo '<hr>';

// 出栈
echo "出栈\n";
array_shift($arr);
print_r($arr);
echo '<hr>';

array_shift($arr);
print_r($arr);
echo "最后出来的是1";
echo '<hr>';

array_shift($arr);
print_r($arr);

echo '<hr>';
echo "<br>";
echo '<hr>';



/**
 * 队列
 * 如果前面进后面出：
 * array_unshift 加入队列
 * array_pop 离开队列
 *
 * 如果后面进前面出：
 * array_push 加入队列
 * array_shift 离开队列
 */
// 进入队列
echo "进入队列\n";
array_unshift($arr, 1);
print_r($arr);
echo '<hr>';

array_unshift($arr, 2);
print_r($arr);
echo '<hr>';

array_unshift($arr, 3);
print_r($arr);
echo '<hr>';

// 离开队列
echo "离开队列\n";
array_pop($arr);
print_r($arr);
echo '<hr>';

array_pop($arr);
print_r($arr);
echo "最后出来的是3";
echo '<hr>';

array_pop($arr);
print_r($arr);
echo '<hr>';