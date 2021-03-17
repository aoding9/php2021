<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <form action="" method="POST">
    <input type="text" name='pid' value='5' placeholder="pid"> <br>
    <input type="text" name='auth_name'  placeholder="auth_name"> <br>
    <input type="text" name='path' placeholder="path"> <br>
    <input type="text" name='is_menu' value='1' placeholder="is_menu"><br>
    @csrf
    <input type="submit" value="添加权限">
  </form>
</body>
</html>