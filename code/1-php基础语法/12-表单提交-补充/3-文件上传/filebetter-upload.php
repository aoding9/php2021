<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
  <pre>
  <!-- 
  文件上传综合优化:
  1.验证上传是否有误
  2.验证格式
  3.验证大小
  4.验证是否为http上传
  5.验证通过,执行上传 
  -->
  
  <?php
  /**
   * 1.验证上传是否有误
   * 根据错误码判断,有错就返回错误信息,如果没错就返回null
   */
  function upload_check_error($file)
  {
    if ($file['error'] != 0) {
      switch ($file['error']) {
        case 1:
          return '文件超过了php.ini中upload_max_filesize的允许值:' . ini_get('upload_max_filesize');
        case 2:
          return '文件大小超过了表单允许的最大值';
        case 3:
          return '只有部分文件上传';
        case 4:
          return '没有文件上传';
        case 6:
          return '找不到临时文件';
        case 7:
          return '文件写入失败';
        default:
          return '未知错误';
      }
    }
  }

  /**
   * 2.验证文件类型
   * 使用finfo扩展函数来判断mime类型
   */
  function upload_check_type($file, $allow = ['image/jpeg', 'image/png', 'image/gif'])
  {
    $info = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($info, $file['tmp_name']);
    if (!in_array($mime, $allow)) {
      // implode函数,将数组用连接符依次连接成字符串
      return '只能上传' . implode(',', $allow) . '格式';
    }
  }

  /**
   * 3.验证文件大小
   * 使用$_FILES[]['size']即可
   */
  function upload_check_size($file, $size = 20480)
  {
    if ($file['size'] > $size) {
      // number_format函数,可以格式化数字,此处是保留1位小数
      return '文件大小不能超过' . number_format($size / 1024, 1) . 'K';
    }
  }

  /**
   * 4.验证文件是否http上传
   * 使用$_FILES[]['size']即可
   */
  function upload_check_ishttp($file)
  {
    // is_uploaded_file函数可以验证文件是否为http方式上传的,因为php也可以通过其他方式执行,防止绕过apache执行php上传
    if (!is_uploaded_file($file['tmp_name']))
      return '文件不是HTTP POST上传的<br>';
  }

  // 把上面的综合起来检查
  function upload_check($file)
  {
    $error =  upload_check_error($file) ?? upload_check_type($file) ?? upload_check_size($file) ?? upload_check_ishttp($file) ?? null;
    return $error;
  }


  // 表单提交
  if (!empty($_POST)) {
    $file = $_FILES['img'];
    if ($error = upload_check($file)) {
      echo $error;
    } else {
      // 开始上传
      function upload_file($file, $path = "uploads")
      {
        // 按日期产生文件夹名称
        $foldername = date('Y-m-d');
        // 上传目录:默认都上传到uploads文件夹
        $folderpath = "./{$path}/{$foldername}";
        // 如果目录不存在,就递归创建
        if (!is_dir($folderpath)) mkdir($folderpath,0777,true);
        // 文件名
        $filename = uniqid('', true) . strrchr($file['name'], '.');
        // 文件路径
        $filepath = "{$folderpath}/{$filename}";
        // 移动临时文件,判断结果
        if (move_uploaded_file($file['tmp_name'], $filepath)) echo "上传成功,路径为{$filepath}";
        else echo "上传失败<br>";
      }
      upload_file($file);
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