<?php

/**
 *  unlink(文件);   文件删除
 * file_exists(文件) 
 * 判断文件是否存在,一般用于删除/读取之前的判断,防止报错
 */

$fpath = './test.txt';
unlink($fpath);

function delete($fpath)
{
  if (file_exists($fpath)) {  #如果文件/文件夹存在
    if (is_dir($fpath)) rmdir($fpath);  # 如果是文件夹 用rmdir删除
    elseif (is_file($fpath)) unlink($fpath);  # 如果是文件 用unlink删除
    else echo '文件夹或文件不存在';
  }
}
