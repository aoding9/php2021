<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>{{$data->mobile}}</h1>
  <form action="/test1_1" method="POST">
    <input type="text" name="mobile" value="{{$data->mobile}}">
    <input type="text" name="password" value="123456">
    @csrf
    <button type="submit">登录</button>
  </form>
</body>
</html>