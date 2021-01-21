<?php

/**
 * * @param boolean $debug 是否为开发模式,默认true
 */
function debug($debug = true)
{
  ini_set('error_reporting', E_ALL); # 抛出所有错误
  if ($debug) {
    ini_set('display_errors', 'on'); # 显示错误
    ini_set('log_errors', 'off'); # 不记录到日志
  } else {
    ini_set('display_errors', 'off'); # 关闭错误显示
    ini_set('log_errors', 'on'); # 开启错误日志
    ini_set('error_log', './err.log'); # 设置错误日志保存位置
  }
}
debug(true); # 开发模式
// debug(false);  # 生产模式   浏览器没有显示错误,而且发现D:\phpstudy_pro\Extensions\php\php7.1.9nts\err.log 中确实产生了错误记录

echo $num; // 故意报错,看下怎么样