php中经常嵌套html使用，由于还要嵌套for、if等等，有很多"{"和"}"，导致阅读不方便，容易搞混
<br>
所以出了一种替代语法，{用:冒号代替，}用endxxx代替，xxx指的流程控制关键字比如endfor endif 等
<table border="1">
  <!-- 第一次for是普通写法 -->
  <?php for ($i = 1; $i < 10; $i++) { ?>
    <tr>
      <!-- 第二次for使用替代语法 -->
      <?php for ($j = 1; $j <= $i; $j++) : ?>
        <td>
          <?php echo $i . '*' . $j . '=' . $i * $j ?>
        </td>
      <?php endfor ?>
    </tr>
  <?php } ?>
</table>