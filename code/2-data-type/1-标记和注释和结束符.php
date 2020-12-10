<!-- php标记 -->
<!-- 1 ASP标记和短标记 以前的 不推荐 -->
<!-- 需要apache配置开启short_open_tag=On asp_tags=On -->
<!-- <% echo 'asp<br>'; %> -->
<!-- < ? echo 'short_tag<br>' ; ?> -->
<!-- 2 脚本标记 -->
<!-- <script language="php">
  echo 'script tag<br>';
</script> -->
<!-- 3 标准标记 推荐-->
<?php
// 结尾用分号分隔
// ? >自带分号作用，可以省略最后一行分号
echo 'standard tag<br>';
echo 'hello php<br>'
?>
<!-- 如果省略 ? > 那么最后一行不可以省略分号 -->
<?php
// 行注释
/*
  块
  注
  释
*/