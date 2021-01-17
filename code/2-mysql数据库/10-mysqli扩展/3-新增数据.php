<pre>
die(str) 函数输出一条消息，并退出当前脚本。
mysqli_connect() 连接数据库
mysqli_connect_error()  返回连接数据库的错误信息，默认为gbk（php8改了，不用转）
mysqli_error()  输出数据库的报错信息
mysqli_set_charset() 设置连接会话的字符集
mysqli_select_db() 选择数据库
mysqli_query() 执行sql语句
mysqli_insert_id()  返回上一次插入的自增长id
mysqli_affected_rows() 返回上一次操作影响的行数

视频说，可以通过影响的行数判断是否执行成功。
<hr>
<?php
// 1 接收数据（通常外部传入，需要验证，此处手动定义）
$name = '小白';
$gender = '男';
$age = 30;
$class_name = '大班';

// 2 连接认证数据库，并处理可能存在的错误信息
$conn = @mysqli_connect('localhost', 'root', 'root') or die(iconv('GBK', 'UTF-8', mysqli_connect_error()));

// 3 设置连接会话字符集
mysqli_set_charset($conn, 'utf8') or die(mysqli_error($conn));

// 4 选择数据库
mysqli_select_db($conn, 'db1') or die(mysqli_error($conn));

// 5 组织sql指令
// 字符串需要用单引号包裹，变量可以解析
$sql = "insert into tb1 values(null,'$name','$gender',$age,'$class_name')";

// 是否返回自增长id的flag，为false，就输出受影响的行数
$auto_id = true;

// 6 执行sql写入数据库
$res = mysqli_query($conn, $sql);
// 对执行结果进行错误处理
if ($res === false) die(mysqli_error($conn));

// 7 执行成功，返回结果
if($auto_id) echo mysqli_insert_id($conn);
else echo mysqli_affected_rows($conn);

// 8 关闭连接
mysqli_close($conn);