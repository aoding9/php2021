<?php 
# 删除新闻
// 安全接收数据
// $id = isset($_GET['id']) ? $_GET['id'] : 0; ?? 的完整写法是这个
$id = isset($_GET['id']) ?? 0;
if(!$id){
  header('refresh:3;url=index.php');
  echo '新闻id没有传奥';
  exit;
}

# 对数据进行删除
include "sql_func.php";
$conn = connect('root','root','news',$error);
if(!$conn){
  header("refresh:3;url=index.php");
  echo $error;
  exit;
}

# 删除操作
$sql  = "delete from news where id = $id";
$res = query($conn,$sql,$error);

# 判断结果
if(mysqli_affected_rows($conn)){
  echo "删除成功";
}else{
  echo "删除失败：".$error;
}

header("refresh:3;url=index.php");


