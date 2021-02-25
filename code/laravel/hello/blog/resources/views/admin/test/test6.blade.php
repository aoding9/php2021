<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
<!-- 如果指定了路由别名，就可以用route(别名)的方式拿到它 -->
<p>
  laravel为每个已验证的用户记录了自己的crsf_token（存到session，原理和图形验证码差不多），提交表单时由VerifyCsrfToken中间件进行验证<br>
  如果不携带，就会失败，比对结果不同也会失败，以防止跨站请求伪造攻击<br>
  csrf_token()方法可以获取到用户的crsf_token，用在ajax提交比较多<br>
  @{{csrf_field()}} 可以直接解析为令牌隐藏域，普通post提交可以用它<br>
  更多介绍看文档：https://learnku.com/docs/laravel/8.x/csrf/9367
</p>
<hr>
<p>从第三方api获取数据的请求一般是跨站了，并且对方不会给你csrf令牌，此时要给VerifyCsrfToken中间件设置$except白名单，将该路由排除出去</p>

  <form action="{{route('t7')}}" method='post'>
    收款人：<input type="text" name='name'> <br>
    金额： <input type="text" name='money'> <br>
    <!-- <input type="hidden" name="_token" value='{{csrf_token()}}'> -->
    <!-- 另一种写法， -->
    {{csrf_field()}}
    <button type='submit'>转账</button>
  </form>

  <!-- 
    cross-site request forgery
    不加CSRF token 会报错 页面已过期： 419 PAGE EXPIRED
    expire
    美: [ɪk'spaɪr] 
    英: [ɪk'spaɪə(r)] 
    v.	断气；届满；吐气；消灭
    网络	过期；已过期；期满
   -->


  
</body>
<script>
// $.ajax({
//   url: '{{route('t7')}}',
//   type: 'post',
//   data: {
//     _token: '{{csrf_token()}}',
//   },
// });
</script>
</html>