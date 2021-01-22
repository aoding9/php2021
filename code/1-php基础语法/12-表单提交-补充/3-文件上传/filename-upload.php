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
   * 文件上传优化:文件重命名为唯一的名字,防止覆盖
   * 方法1:时间戳time()
   * 方法2:uniqid([str 前缀],[bool 是否拼接随机数])  生成唯一的id
   */
  if (!empty($_POST)) {
    $file = $_FILES['img'];
    /*
    唯一文件名+后缀名: 
    time()获取时间戳
    rand(100,999) 生成随机数,防止同时提交产生覆盖
    strrchr(str 源字符串,str 截断符)  从右往左找截断符,返回截断符到末尾的那一段,即后缀名
    */

    $upload_path = "uploads";
    $file_name = time() . rand(100, 999); // 文件名
    $file_extensions =  strrchr($file['name'], '.');
    $file_newname = "{$upload_path}/{$file_name}{$file_extensions}";
    echo $file_newname;

    if ($file['error'] == 0) {
      move_uploaded_file($file['tmp_name'], $file_newname);
    } else {
      echo "上传失败,错误码:" . $file['error'];
    }
  }

  ?>
</pre>

  <form method="post" action="" enctype='multipart/form-data'>
    <input type="file" name="img">
    <input type="submit" name="button" value="上传">
  </form>
</body>

</html>