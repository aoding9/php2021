<?php
// 对于一些重复使用的代码进行函数封装

/**
 * 1 连接认证数据库，初始化
 * $error使用引用传值，方便外部处理错误
 */
function connect(&$error, $username, $password, $dbname, $host = 'localhost', $port = '3306', $charset = 'utf8')
{
  # 连接认证
  $conn = @mysqli_connect($host, $username, $password, $dbname, $port);

  # 如果连接失败，记录错误信息，并返回false
  if (!$conn) {
    $error = iconv('gbk', 'utf-8', mysqli_connect_error());
    return false;
  }


  # 设置字符集
  if (!mysqli_set_charset($conn, $charset)) {
    $error = mysqli_error($conn);
    return false;
  }

  # 返回连接对象
  return $conn;
}

/**
 * 2 执行sql和错误检测及处理
 */

function execute($conn, $sql, &$error)
{
  $res = mysqli_query($conn, $sql);

  # 如果执行失败，错误处理，返回false
  if (!$res) {
    $error = mysqli_error($conn);
    return false;
  }

  # 返回结果集对象
  return $res;
}

/**
 * 3 数据查询操作
 * 依赖于execute()
 * 分查询一条和查询多条
 */

function read($conn, $sql, &$error, $all = false)
{
  #调用执行函数
  $res = execute($conn, $sql, $error);

  # 判断结果，error已经在执行函数中处理，此处只需返回false
  if (!$res) {
    return false;
  }

  # 解析结果
  if ($all) {
    # 获取全部结果
    $list = [];
    while ($row = mysqli_fetch_assoc($res)) {
      $list[] = $row;
    }
    return $list;
  } else {
    # 获取一条结果
    return mysqli_fetch_assoc($res);
  }
}

/**
 * 3 写操作
 * 包括插入、修改、删除
 * 是否需要获取自增长id（insert操作）
 */
function write($conn, $sql, &$error, $insert = false)
{
  # 默认是删除或修改，即不需要获取自增长id
  $res = execute($conn, $sql, $error);

  # 判断结果
  if (!$res) {
    return false;
  }

  # 判断是返回影响的行数，还是返回自增长id
  if ($insert) return mysqli_insert_id($conn);
  else return mysqli_affected_rows($conn);
}

/* 测试代码注释掉
// 实际使用一下看看
# 1 连接
echo "<hr>连接数据库\n";
$conn = connect($error, 'root', 'root','db1');
// 错误处理
if(!$conn) die($error);

# 2 读操作
echo "<hr>读操作\n";
var_dump(read($conn,"select * from tb1",$error,true));

# 3 写操作
echo "<hr>写操作\n";
echo write($conn,"insert into tb1 values(null,'小红','女',20,'四班');",$error,true);
*/