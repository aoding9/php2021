<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="/logout">退出</a>
  

  @foreach ($tree as $i)
  <hr>
  + <a href="{{$i->path?$i->path:'javascript:;'}}"> {{$i->auth_name}}</a><br>
  @foreach ($i->children as $i)
  |-<a href="{{$i->path}}">{{$i->auth_name}}</a><br>

  @endforeach
  @endforeach
</body>
</html>