<pre>
$_GET是自动接收的get方式 参数
$_POST 是post的
$_REQUEST 是get和post的，会覆盖，不推荐
<hr>
<?php
  // var_dump($_GET,$_POST,$_REQUEST);

  // 安全接收方式
  // 取出数据进行加工处理，数据可能不安全

  /**
   * 先判断id参数是否存在，防止报错
   * intval 因为id通常为逻辑主键，加工成整形，可以防止sql攻击
   * 如果转换失败就为0，因为逻辑主键一般不为0，即没有这个数据
   */
  $id = isset($_GET['id'])? intval($_GET['id']):0;
