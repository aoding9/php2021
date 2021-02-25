<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  我是test3.blade.php

  <hr>
  <p>显示变量</p>
  <p>{{$data}}</p>
  <p>
    <hr>
    <p>执行函数：在外面套2个花括号即可，没有管道写法</p>
  <p>{{date('Y-m-d')}}</p>

  <hr>
  <p>不解析</p>
  <p>@{{$data}}</p>
  <p>@{{date('Y-m-d')}}</p>

</body>

</html>