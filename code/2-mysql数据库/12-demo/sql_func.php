<?php
# 1 初始化功能：连接认证、选择数据库、设定字符集
# 成功返回连接对象，失败返回false，错误记录在错误参数中
function connect($user, $pass, $dbname, &$error, $host = 'localhost', $port = '3306', $charset = 'utf8')
{
  # 连接认证
  $conn = @mysqli_connect($host, $user, $pass, $dbname, $port);

  # 验证错误
  if (!$conn) {
    $error = iconv('gbk', 'utf-8', mysqli_connect_error());
    return false;
  }

  # 设置字符集
  if (!mysqli_set_charset($conn, $charset)) {
    $error = mysqli_error($conn);
    return false;
  }

  # 返回对象
  return $conn;
}


# 2 外部传入SQL，负责执行也验证SQL语法问题，成功返回结果，失败返回false，错误记录在错误参数中
// 有可以执行普通的写操作
function query($conn, $sql, &$error)
{
  # 执行SQL
  $res = mysqli_query($conn, $sql);

  # 判定
  if ($res === false) {
    $error = mysqli_error($conn);
    return false;
  }

  # 返回执行的正确结果
  return $res;
}


# 3 用户提供SQL指令，可以查询一条或者多条记录
function read($conn, $sql, &$error, $all = false)
{
  # 执行SQL，并判定结果
  $res = query($conn, $sql, $error);
  if ($res === false) return false;

  # 解析结果集
  $lists = [];
  if ($all) {
    # 多条数据：二维数组
    while ($row = mysqli_fetch_assoc($res)) {
      $lists[] = $row;
    }
  } else {
    # 一条数据：一维数组
    $lists = mysqli_fetch_assoc($res);
  }

  # 释放资源，返回结果
  mysqli_free_result($res);
  return $lists;
}


// 自动组织sql语句

# 4 自动更新
# 用户提供要更新的数据和主键id，自动组装SQL
# 成功返回受影响的行数，失败返回false（0表示没有更新）
function auto_update($conn, $data, $table, &$error, $id = 0)
{
  # 组织更新部分数据：字段名 = 值
  $set = '';
  foreach ($data as $k => $v) {
    $set .= $k . "='{$v}',";
  } # title = 'title',content = 'content',


  # 清除多余的右侧逗号
  $set = rtrim($set, ',');    # $set : title = 'title',content = 'content'

  # 组织更新指令
  $sql = "update {$table} set {$set} ";

  # 组装where条件（id不为0才组织）：要求主键字段名字必须为ID
  if ($id) $sql .= ' where id = ' . $id;
  # update 表名 set title = 'title',content = 'content' where id = 1

  # 执行
  if (query($conn, $sql, $error)) return mysqli_affected_rows($conn);
  else return false;
}
?>
