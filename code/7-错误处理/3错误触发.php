<?php
// 题外话 设置header
header('content-type:text/html;charset=utf8');

// 语法错误和运行错误会自动触发
// 如果要手动触发用户定义的错误，可以这么做

// 假设有一个除法函数，我们要对第二个参数进行检验，如果为0，就触发错误，并结束执行，默认为notice级别，可修改
function divide($a, $b)
{
  if ($b == 0) {
    // trigger_error('除数不能为0', E_USER_ERROR);
    trigger_error('除数不能为0');
    return false;
  }
  return $a / $b;
}
// 没报错
echo divide(1,2);

// 报错
echo divide(1,0);

// 由于默认是notice错误，所以不影响后面执行
echo divide(1,1);