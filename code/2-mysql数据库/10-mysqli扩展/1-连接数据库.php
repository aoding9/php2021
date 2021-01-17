
mysqli扩展，可以让php起到mysql客户端的作用

<?php
// header('Content-type:text/html;charset=utf-8');

// 看一下有么有加载mysqli扩展
// phpinfo();

// 连接，这里抑制了错误，后面手动判断
// $conn = @mysqli_connect('localhost:33061', 'root', 'Xy+5217733-'); // 故意写错:由于目标计算机积极拒绝，无法连接。

/**
 * 连接成功会返回连接对象，失败返回false。
 * 面向对象的编程，我们暂时只用到面向过程的
 * 用一个变量把返回的对象保存起来，通过他来操作数据库
 */
// var_dump(@mysqli_connect('localhost:3306', 'root', 'root'));
$conn = @mysqli_connect('localhost:3306', 'root', 'root');

// iconv可以转换字符集
// mysqli_connect_error返回的错误，字符集是GBK，需要转换成UTF-8 好像必须要加短杠-
// if (!$conn) die(iconv('gbk', 'utf8', mysqli_connect_error())); // 啥都没转出来，要用utf-8

// php8好像自动对gbk转换了可以直接显示，用php7时才需要iconv转换
if (!$conn) die(iconv('GBK', 'UTF-8', mysqli_connect_error()));

// 错误检查，如果连接失败，会有对应的错误信息
// if (!$conn) die(mysqli_connect_error());

// 关闭连接,把之前那个对象传进来即可
mysqli_close($conn);