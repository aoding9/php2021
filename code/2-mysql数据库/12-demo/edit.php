<?php 
$id = $_GET['id'] ?? 0;
if(!$id){
  header('refresh:3;url=index.php');
  echo "要编辑的文章不存在";
  exit;
}

# 获取数据
include "sql_func.php";

$conn = connect('root','root','news',$error);
if(!$conn) die($error);

# 自动查询
$news = auto_read($conn,'news',$error,['id'=>$id]);
if(!$news){
  header('refresh:3;url=index.php');
  echo "要编辑的文章不存在";
  exit;
}else{
  include "edit.htm";
}
?>