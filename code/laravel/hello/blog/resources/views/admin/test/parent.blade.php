<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>我是父级模板</title>
</head>
<body>
  <header><h1>我是头部</h1></header>

  <!-- 此区域为可重写区域 -->
  <!-- yield [jiːld]  此处可以理解为让步吧大概，或者提供，让子模版提供具体内容
      v.	出产(作物); 产生(收益、效益等); 提供; 屈服; 让步; 放弃; 缴出;
      n.	产量; 产出; 利润;
    -->
  @yield('body')
  

  <footer><h1>我是底部</h1></footer>
</body>
</html>