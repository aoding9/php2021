<pre>
  form表单提交的数据,会自动被php接收到,根据method不同,分别保存在$_GET和$_POST中,$_REQUIRE两者都有,但可能出现覆盖意外

  当一个请求中同时有get和post时,根据默认配置项request_order = "GP"  , php先获取GET，在获取POST值,$_REQUIRE中同名参数,get提交会被post覆盖
  request获取效率低,尽可能不使用他,除非提交的类型不确定

  
  参数以数组形式保存,key就是表单元素的name,value对应表单元素的value
  
  get方式:
  安全性:不太安全,可以在url中看到参数
  提交原理:提交的数据和数据之间独立,一个个地提交
  数据大小:一般不超过255字节
  灵活性:灵活,页面跳转即可传递参数
  
  post:
  安全性:参数不会暴露在url中,安全性较高
  提交原理:将提交的数据变成XML格式,整体提交
  数据大小:根据php.ini决定,配置项post_max_size = 8M(默认值)
  灵活性:不灵活,需要有表单参与

  <?php
  /*
1、 html跳转
<a href="index.php?name=tom&age=20">跳转</a>

2、JS跳转
<script type="text/javascript">
	location.href='index.php?name=tom&age=20';
	location.assign('index.php?name=tom&age=20');
	location.replace('index.php?name=tom&age=20');
</script>

3、PHP跳转
header('location:index.php?name=tom&age=22') 
*/
  ?>
  复选框元素name属性命名后面要带[],不然会覆盖
</pre>


<?php
if (isset($_POST['button'])) {
  print_r($_POST['hobby']);
}
?>
<form method="post" action="">
  爱好：
  <input type="checkbox" name="hobby[]" value='爬山'>爬山
  <input type="checkbox" name="hobby[]" value='抽烟'>抽烟
  <input type="checkbox" name="hobby[]" value='喝酒'>喝酒
  <input type="checkbox" name="hobby[]" value='烫头'>烫头
  <input type="submit" name="button" value="提交">
</form>