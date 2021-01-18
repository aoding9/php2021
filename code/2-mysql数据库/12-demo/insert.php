<?php
# 新增入库
// 设置浏览器字符集
header("Content-type:text/html;charset=utf8");
// print_r($_POST);

// 接收数据
// https://www.jiloc.com/46132.html  $b = $a?? $c ;相当于$b= isset($a)?$a:$c;    $b = $a?$a: $c 则是 $b = ！empty($a) ? $a:$c;
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$a_id = $_POST['author'] ?? 0;

// 安全判断
if (empty($title) || empty($content)) {
  // 跳转回去
  header("refresh:2;url=add.php");
  echo "新闻和标题不能为空";
  // exit; # exit意为出口，退出，中断执行，此处用于断点调试
}

# 连接认证
$conn = @mysqli_connect('localhost','root','root','news','3306') or die(mysqli_connect_error());

# 设置字符集
mysqli_set_charset($conn,'utf8') or die(mysqli_error($conn));

# 组织sql插入
# 数据入库：时间戳可以使用mysql自动生成，也可以使用PHP生成好放进去（建议生成好）
$publish = time();
$sql = "insert into news values(null,'{$title}','{$content}',{$a_id},{$publish})";
$res = mysqli_query($conn,$sql);

# 判定数据
if($res){
  header('refresh:2;url=index.php');
  echo '新闻：' . $title . ' 新增成功！';
}else{
  header('refresh:3;url=add.php');
  echo '新闻：' . $title . '新增失败！';
  // 可以输出错误，也可以记录到日志里面，或者其他方式处理
  echo "<br>错误原因：".$error = mysqli_error($conn);
}