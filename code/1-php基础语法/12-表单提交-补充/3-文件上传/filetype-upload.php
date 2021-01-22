<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
  <pre>
  <?php
  /**
   * 文件上传优化: 验证文件类型,防恶意攻击
   * 方法1:比较扩展名,不能防文件伪装
   * 方法2:比较$_FILE[]['type']的mime类型,不能防文件伪装
   * 方法3:开启php_fileinfo扩展,可以防文件伪装
   */


  // 简单的文件伪装就是把后缀名改了,本质上还是原来的类型,但是php自带的识别不能判断出来,需要开启扩展
  // 这里新建一个txt文本,里面写点内容,然后改成jpg后缀,再上传就允许了,然后就可以shell执行这个文件
  /*
   cat .\伪装文件.jpg
  <script>var a;</script>
  */

  # 1 后缀名判断法
  /*   if (!empty($_POST)) {
    $file_extension =  strrchr($_FILES['img']['name'], '.');
    $allow = ['.jpg', '.png', '.gif']; // 允许的后缀名
    if (in_array($file_extension, $allow)) {
      echo '允许上传';
    } else {
      echo '不是允许的后缀名';
    }
  } */

  # 2 $_FILE[]['type']判断法
  /*  if (!empty($_POST)) {

    $mime=$_FILES['img']['type'];  // 上传文件类型
    $allow = ['image/jpeg', 'image/png', 'image/gif']; // 允许的mime
    if (in_array($mime, $allow)) {
      echo '允许上传';
    } else {
      echo '不是允许的mime';
    }
  } */

  # 3 开启php_fileinfo扩展,然后可以使用finfo_开头的,一系列文件信息判断的函数
  if(!empty($_POST)) {
    //第一步：创建finfo资源  FILEINFO_MIME_TYPE是参数选项值之一,返回判断文件MIME类型的fileinfo资源
    $info=finfo_open(FILEINFO_MIME_TYPE);
    //var_dump($info);		//resource(2) of type (file_info) 
    //第二步：将finfo资源和文件做比较
    $mime=finfo_file($info,$_FILES['img']['tmp_name']);
    print_r($mime);
    //第三步，比较是否合法
    $allow=array('image/jpeg','image/png','image/gif');	//允许的类别
    echo in_array($mime,$allow)?'合法':'不合法';
  }

  ?>
</pre>

  <form method="post" action="" enctype='multipart/form-data'>
    <input type="file" name="img">
    <input type="submit" name="button" value="上传">
  </form>
</body>

</html>