<pre>
概念：用mysqli扩展，查询数据库数据，并且变成浏览器识别的格式
逻辑：
1 mysqli查询数据，此时返回结果集对象（php和浏览器都不可识别）
2 利用结果集查询mysqli_fetch系列函数，翻译出结果，此时结果是php能识别的数组
3 php将数组按照指定格式解析到html中，浏览器才能识别


步骤
1 根据需求确定要获取的数据来源
2 连接认证数据库、设置字符集、选择数据库
3 组织sql查询指令、发送到数据库执行、判断执行情况

4 解析查询结果集
  - 索引数组：mysqli_fetch_row()  不包含字段名
  - 关联数组：mysqli_fetch_assoc()  包含字段名（即数组下标，使用较多）
5 释放结果集资源：（这个也可以后面做，只要不需要使用结果集了就可以释放）
  - mysqli_free_reslut()  结果集会占用内存，已经拿到数据后不需要了，就释放掉
6 实现数据输出
7 查询完成 关闭连接
</pre>
<hr>
<?php
/**
 * 实例
 * 获取db1.tb1中学生信息，并且显示在表格中
 */

//  1接收数据：查询条件
// 当前没有

// 2 连接初始化
$conn = @mysqli_connect('localhost', 'root', 'root') or die(iconv('gbk', 'utf-8', mysqli_connect_error()));
mysqli_set_charset($conn, 'utf8') or die(mysqli_error($conn));
mysqli_select_db($conn, 'db1') or die(mysqli_error($conn));


// 3 执行查询，并判断是否成功
$sql = 'select * from tb1';
$res = mysqli_query($conn, $sql);

// 注意：实际开发中一般这么写，而不是or，这样可读性更好，而且方便进行其他处理
if ($res === false) die(mysqli_error($conn));

// 4 解析结果集
// 一次取出一条记录，如果取不到就返回false
// $one = mysqli_fetch_assoc($res);

// 若要取出全部，使用循环保存
$list = [];
while ($one = mysqli_fetch_assoc($res)) {
  $list[] = $one;
}

// 5 释放结果集资源
mysqli_free_result($res);

// 6 关闭连接
mysqli_close($conn);

// 7 输出数据
// print_r($list);
$trs = "";
$tr = "<tr>
        <td>id</td>
        <td>姓名</td>
        <td>性别</td>
        <td>年龄</td>
        <td>班级</td>
      </tr>";
$trs .= $tr;

foreach ($list as $one) {
  $tr = "<tr>
          <td>{$one['id']}</td>
          <td>{$one['name']}</td>
          <td>{$one['gender']}</td>
          <td>{$one['age']}</td>
          <td>{$one['class_name']}</td>
        </tr>";
  $trs .= $tr;
}


echo "<table border='1'>" . $trs . "</table>";
