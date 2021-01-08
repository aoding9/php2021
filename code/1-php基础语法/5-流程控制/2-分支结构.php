<?php
$a = 5;

// 根据条件是否为真，判断是否执行对应代码块

// if分支
// 适用于所有的条件判断
if ($a == 7) {
  echo '是周日';
} else if ($a==6){
  echo '是周六';
}else{
  echo '是工作日';
}

echo '<br>';
// switch分支
// 适用于同一条件，并且条件有明确的多个值，对应不同的代码块
// 效率更高
switch($a){         //  条件表达式
  case 6:           //  条件的值
    echo '是周六';  //  代码块
    break;          //  switch匹配成功，会顺序执行下面所有代码，因此需要break打断继续执行
  case 7:
    echo '是周日';
    break;
  default:          //  上面条件都不匹配时，执行default代码块
    echo '是工作日';
    break;
}