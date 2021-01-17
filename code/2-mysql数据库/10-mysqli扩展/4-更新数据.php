<pre>
1 收集用户更新的数据信息并验证
2 连接认证数据库
3 设置字符集
4 选择数据库
5 组织更新SQL指令
6 发送给数据库执行
7 判断指令执行情况
  mysqli_errno 错误编号
  mysqli_error 错误信息
8 返回受影响的行数
9 更新完成，关闭连接

<hr>
<?php
/**
 * 实例
 * 将db1.tb1中所有人的年龄+1
 */

//  1 接收数据，并且验证
// 此处没有

// 2 连接认证数据库 处理可能的错误信息
$conn = @mysqli_connect('localhost', 'root', 'root') or die(iconv('gbk', 'utf-8', mysqli_connect_error()));


// 3 设置字符集
mysqli_set_charset($conn, 'utf8') or die(mysqli_error($conn));

// 4选择数据库
mysqli_select_db($conn, 'db1') or die(mysqli_error($conn));

// 5 组织sql指令
$sql = "update tb1 set age = age + 1";

// 6 发送sql指令去执行
$res = mysqli_query($conn, $sql);

// 7 判断执行情况
if ($res === false) die(mysqli_error($conn));

// 8 返回结果
echo mysqli_affected_rows($conn);

// 9 关闭连接
mysqli_close($conn);
