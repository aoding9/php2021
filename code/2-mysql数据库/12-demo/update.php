<?php 
# 用于更新文章
# 接收数据
// print_r( $_POST);
$id = $_POST['id'] ?? 0;
$data['title'] = $_POST['title'] ?? '';
$data['content'] = $_POST['content'] ?? '';
if(empty($data['title'])||empty($data['content'])){
  header("refresh:3;url=edit.php?id=".$id);
  echo "标题和内容不能为空";
  exit;
}


include "sql_func.php";
$conn = connect('root','root','news',$error);
if(!$conn){
  header("refresh:3;url=edit.php?id=".$id);
  echo $error;
  exit;
}

#自动更新
$res = auto_update($conn,$data,'news',$error,$id);
if(!$res){
  header("refresh:3;url=edit.php?id=".$id);
  echo "没有要更新的数据";
}else{
  header("refresh:3;url=detail.php?id=".$id);
  echo "更新成功";
}




?>