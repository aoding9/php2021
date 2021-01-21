<?php
// 打开目录,返回资源类型
echo "当前目录:" . __DIR__;
$folder = opendir('/');
// var_dump($folder);  // resource(3) of type (stream)

// 循环读取目录 一次读取一个
while ($f = readdir($folder)) {
  echo $f . "<br>";
}
