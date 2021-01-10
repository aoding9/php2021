<!-- <pre> -->

<?php
  $arr = [ 1,3,5,8,9,12,100];

  // 查找数组中是否存在某个元素,如果存在就返回他的位置
  function check_order($arr,$num){
    for($i=0,$len=count($arr);$i<=$len-1;$i++){
      if($arr[$i]==$num)return $i;
    }
  }
  echo check_order($arr,12); // 输出了5
