<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
  <pre>
  <?php
  // 服务器接收文件:用$_FILES保存
  /*
   超全局变量`$_FILES`是一个二维数组，用来保存客户端上传到服务器的文件信息。二维数组的行是文件域的名称，列有5个。
    1、`$_FILES[][‘name’]`：上传的文件名
    2、`$_FILES[][‘type]`：上传的类型，这个类型是MIME类型（image/jpeg、image/gif、image/png）
    3、`$_FILES[][‘size’]`：文件的大小，以字节为单位
    4、`$_FILES[][‘tmp_name’]`：文件上传时的临时文件
    5、`$_FILES[][‘error’]`：错误编码(值有0、1、2、3、4、6、7)0表示正确
   */
  if (!empty($_POST)) {
    // form不加enctype="multipart/form-data"获取不到文件,因为默认值是urlencoded
    print_r($_FILES);
    $file = $_FILES['file'];
    // 判断文件是否上传成功
    if ($file['error'] == 0) {
      //文件上传
      // 文件上传会先保存到临时文件,然后再用move_uploaded_file函数,移动临时文件到指定的位置
      move_uploaded_file($file['tmp_name'], './' . $file['name']);
    } else {
      echo "上传失败,错误码:" . $file['error'];
    }
  }
  /*
  关于$_FILES[][‘error’]错误码,一般关注0和4即可,
  0   正确
  1   文件大小超过了php.ini中允许的最大值    upload_max_filesize = 2M 可修改
  2   文件大小超过了表单允许的最大值(<input type='hidden' name='MAX_FILE_SIZE' value='1024'>即表单最大1024字节)
  3   只有部分文件上传
  4   没有文件上传
  6   找不到临时文件
  7   文件写入失败 (从临时文件写到目标路径时失败)
  */
  /*
  关于文件上传的php.ini配置项,可能导致文件上传失败

  post_max_size = 8M：表单允许的最大值

  upload_max_filesize = 2M：允许上传的文件大小

  upload_tmp_dir =F:\wamp\tmp：指定临时文件地址，如果不指定,则由操作系统指定

  file_uploads = On：是否允许文件上传

  max_file_uploads = 20：允许同时上传20个文件

  */
  ?>
</pre>

  <!-- 
  浏览器上传:
  form的enctype属性
  application/x-www-form-urlencoded  带格式的文本数据,将表单数据转成了xml格式,<uname>小白</uname>
  application/json  表单转成json格式提交
  multipart/form-data  复合的表单数据,字符串 二进制都可以传 文件上传要用这个
  text/plain  纯文本

  另外,action不写则表示./下的同名文件,但是中文路径不识别,所以出问题了,复制到根目录在执行即可
 -->
  <form method="post" action="" enctype='multipart/form-data'>
    <input type="file" name="img">
    <input type="submit" name="button" value="上传">
  </form>
</body>

</html>