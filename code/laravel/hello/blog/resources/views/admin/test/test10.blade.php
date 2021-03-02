<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- 新版拉若8使用tailwindcss分页器 -->
  <link href="/css/tailwind.min.css" rel="stylesheet">
  <style>
 
  img{
    width: 100px;
  }
  .page {
    width: 800px;
  }
  </style>
</head>

<body>
  <table border="1" cellspacing="0">
    <tead>
      <tr>
        <th>id</th>
        <th>用户名</th>
        <th>年龄</th>
        <th>邮箱</th>
        <th>头像</th>
      </tr>
    </tead>
    <tbody>
    @foreach ($data as $v)
      <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->age}}</td>
        <td>{{$v->email}}</td>
        <td><img src="{{$v->avatar}}" ></td>
      </tr>
    @endforeach
    
    </tbody>
  </table>

 <div class="page"> {{$data->links()}}</div>

</body>

</html>