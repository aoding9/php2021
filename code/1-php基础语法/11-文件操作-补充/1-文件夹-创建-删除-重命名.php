关于为什么aa没有创建到当前目录:因为用了中文路径,所以php不识别当前目录,从而写到了php安装目录下面
<?php 
  // 创建目录

  // mkdir('./aa');

  # 注意,默认不是递归创建,如果上级不存在会报错
  // mkdir('./cc/bb');  

  # true表示递归创建
  // mkdir('./cc/bb',true);

  # 还可以设置权限,0777表示所有权限
  // mkdir('./dd',0777,true);


  // 删除目录
  // rmdir('./aa');
  // 没有递归删除,安全考虑

  // 重命名
  // rename('./aa','./abcdef');  // 将aa该为abcdef

  // 判断是否为文件夹
  // echo is_dir('./aa');  # 返回布尔值

  
?>