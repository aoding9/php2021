<pre>
二分查找算法
二分查找要求线性表中的节点按关键字升序或降序排列，用给定值k与中间节点的关键字比较，中间点将线性表分成2个子表
若相等则查找成功，若不相等，再根据k与中间节点关键字的比较结果，确定下一步查找哪个子表，递归进行，直到查找成功或发现表中没有能匹配的节点

步骤：
1 计算数组长度
2 确定左右边界的指针位置
3 找到中间位置
4 比较中间值和目标值的关系，如果相等，直接找到
5 如果不等，则根据大小关系，确定目标值在在左边还是右边，然后重复，直到找到或者发现不存在


和电视上那种猜金额大小的节目差不多，先猜中间数，主持人告诉你比目标大还是小了，然后，你的猜测范围就缩小了一半，继续重复猜，直到猜出结果（运气最差则猜到只剩结果+1和结果-1，然后再猜一次必定猜中；
不过这里可能没有这个数字。

顺序查找的范围每次是-1，二分查找的范围缩小每次是/2，第一次是/2^1，第二次就是2^2，所以速度快很多。


<?php
$arr = [1, 3, 5, 8, 9, 12, 100];

// 可以用递归，不过这里是使用的普通循环 
function check_order($arr, $dest)
{
  // 1 数组长度
  $len = count($arr);

  // 2 确定边界指针
  $left = 0;
  $right = $len - 1;

  // 循环匹配
  while ($left <= $right) {

    // 3 确定中间
    $middle = floor(($left + $right) / 2);
    $mValue = $arr[$middle]; // 因为他要多次比较，所以保存一个变量

    // 4 比较中间值和目标值的关系，如果相等，直接找到
    if ($mValue == $dest) {
      return $middle;
    }

    // 5 如果不相等，则确定在left还是right，缩小范围重复查找
    if ($dest < $mValue) {
      // dest在左边，修改右边界到middle-1
      $right = $middle - 1;
    } else {
      // dest在右边，修改左边界到middle+1
      $left = $middle + 1;
    }
  }
  return false . '找不到';
}
echo check_order($arr, 12); // 输出了5
echo "<hr>";
echo check_order($arr, 1000); // 输出找不到



// 递归实现
echo "<hr>";
// 这里引用传递arr
function binarySearch(&$arr, $left, $right, $target)
{
  // 递归出口1：没有找到
  if ($left > $right) {
    return false;
  }

  $mid = floor(($left + $right) / 2);

  // 递归出口2：找到了
  if ($arr[$mid] == $target) {
    return $mid.'=>'.$arr[$mid];
  } else if ($arr[$mid] > $target) {
    // 递归点1：在小序列，right缩小为mid-1
    return binarySearch($arr, $left, $mid - 1, $target);
  } else {
    // 递归点2：在大序列，left增大为mid-1
    return binarySearch($arr, $mid + 1, $right, $target);
  }
}

echo binarySearch($arr, 0, count($arr), 12); // 输出了5
