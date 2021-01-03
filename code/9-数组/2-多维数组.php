<?php

/***
 * 1 多维数组
 *  数组元素为数组
 */

/**
 * 2 二维数组
 *  数组元素都是一维数组（一维数组就是元素不都是数组）
 */

$arr = array(
  0 => array('name' => 'tom1', 'age' => '1'),
  1 => array('name' => 'tom2', 'age' => '2'),
  2 => array('name' => 'tom3', 'age' => '3'),
);

echo '<pre>';
print_r($arr);
/*输出结果：
Array
(
    [0] => Array
        (
            [name] => tom1
            [age] => 1
        )

    [1] => Array
        (
            [name] => tom2
            [age] => 2
        )

    [2] => Array
        (
            [name] => tom3
            [age] => 3
        )

)
*/

/***
 * 3 多维数组 
 * 套娃就行
 * 注意；php没有数组的维度限制，但建议不超过3维，否则增加访问复杂度，降低效率
 */

/**
 * 4 异形数组
 * 数组元素有普通数据，也有数组，不建议，尽量规则化
 */
