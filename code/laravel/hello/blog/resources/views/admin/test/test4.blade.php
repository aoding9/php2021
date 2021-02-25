<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  blade模板循环、分支语法
  <hr>
  <p>循环指令</p>
  key是循环索引，不需要时可以这么写 @@foreach($data as $v) <br><br>

  @foreach($data as $k => $v)
     {{$v->id}} | name: {{$v->name}} | email: {{$v->email}}<br>

  @endforeach

  <hr>
  <p>分支指令</p>
  <p>今天的星期数字：{{$day}}</p>
  星期
  @if($day ==1 )
  一
  @elseif($day == 2)
  二
  @else
  三 四 五 六 日
  @endif

</body>

</html>