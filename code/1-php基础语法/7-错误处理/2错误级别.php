<?php
// 错误级别被定义为系统常量，每种错误对应一个位，通过位运算可以选择要哪些错误级别
  echo decbin(E_ALL);
  echo '<br>';
  echo decbin(E_NOTICE);
  echo '<br>';
  echo decbin(~E_NOTICE);
  echo '<br>';
  echo decbin(E_ALL&~E_NOTICE);
