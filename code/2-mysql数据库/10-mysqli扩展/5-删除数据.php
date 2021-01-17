<pre>
步骤和更新差不多，但是有几个小地方不同

1 收集用户删除的数据信息并验证（通常由权限验证）
2 连接认证数据库
3 设置字符集
4 选择数据库
5 如果有必要，需要验证要删除的数据在数据库是否存在
6 组织SQL指令
7 发送给数据库执行
8 判断指令执行情况
  mysqli_errno 错误编号
  mysqli_error 错误信息
9 返回受影响的行数
10 操作完成，关闭连接

总结
删除与更新、新增的本质是一样的，都是写操作，只是业务层有些区别
新增：用户要提交全部数据（数据最多，无主键，自增长）
更新：用户提交部分数据（数据较少，有主键，更新条件）
删除：用户点击或者执行（只有主键）

注意：很多时候，重要的业务数据虽然对用户提供删除操作，但是并不真的删除，而是提供一个字段用来标记是否删除，即删除变成更新操作。类似回收站的那种。

<hr>
<?php
/**
 * 实例
 * 删除db1.tb1中 行数记录为1的学生
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
$sql = "delete from tb1 limit 1";

// 6 发送sql指令去执行
$res = mysqli_query($conn, $sql);

// 7 判断执行情况
if ($res === false) die(mysqli_error($conn));

// 8 返回结果，实际使用中，会拿到这个结果，然后进行相关处理
echo mysqli_affected_rows($conn);

// 9 关闭连接
mysqli_close($conn);
