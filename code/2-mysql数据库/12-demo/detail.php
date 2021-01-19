<?php 
$id = $_GET['id'] ?? 0;
if(!$id){
  header('refresh:3;url=index.php');
  echo "非法访问";
  exit;
}

# 获取数据
include "sql_func.php";

$conn = connect('root','root','news',$error);
if(!$conn) die($error);

# 查询数据
$sql = "select n.* ,a.name from news n left join author a on n.a_id = a.id where n.id = $id";
$news = read($conn,$sql,$error);
if(!$news){
  header('refresh:3;url=index.php');
  echo "新闻不存在";
}else{
  include "detail.htm";
}

?>