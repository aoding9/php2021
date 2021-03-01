<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<!-- 通过ajax提交表单，laravel会自动返回json格式的信息，其中包含错误提示 -->
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script>
 <!-- <script>
  $(function(){
    $.post({
      url:'/test9',
      data: {'_token':"{{ csrf_token() }}"},
      dataType: 'post',
      success: function(data){console.log(data);},
      error: function(xhr){console.log(JSON.parse(xhr.responseText));}
    });
  })
</script> -->
<script>
  // 点击图片刷新验证码
  $(function(){
    $('#captcha').click(function(){
      // 地址相同,加随机数防缓存
      $(this).attr({src:'{{captcha_src()}}'+'&_='+Math.random()});
    })
  })
</script>

<!-- 必须要post类型，enctype='multipart/form-data'，然后要有input:file框，如果没关csrf也要加上 -->
  <form action="/test9" method='post' enctype="multipart/form-data">
  <!-- <form action="/mod_add" method='post'> -->
    <input type="text" name='name' placeholder="输入用户名"><br>
    <input type="text" name='age' placeholder="输入年龄"><br>
    <input type="text" name='email' placeholder="输入邮箱"><br>
    <input type="file" name="avatar" id=""> <br>
    <input type="text" name='captcha' placeholder="输入验证码"><img id='captcha' src="{{captcha_src()}}" alt=""> <br>
    {{csrf_field()}}
    <input type="submit" value="提交">
    
  </form>

<p>验证未通过时，错误信息自动存到session的$error里面</p>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors -> all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>    
    </div>
  @endif
</body>
</html>