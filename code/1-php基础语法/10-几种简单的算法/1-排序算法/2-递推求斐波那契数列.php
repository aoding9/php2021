<pre>
1,1,3,5,8,13,...,n
求n

规律：
f1=1
f2=1
f3=f1+f2
f4=f3+f2
...
fn=f(n-1)+f(n-2);

递推思路：由第一和第二个数得到第三个数，以此类推，直到计算出结果

<?php
$f[1] = 1;
$f[2] = 1;

// 假如要求第15个数
$n = 15;

for ($i = 3; $i <= $n; $i++) {
  $f[$i] = $f[$i - 1] + $f[$i - 2];
}
// 查看
print_r($f);
echo '<hr>';

// ok，封装成函数
function my_recursive($des)
{
  // 如果为1或2，直接得到1
  if ($des === 1 || $des === 2) return 1;
  $f = [1 => 1, 2 => 1];
  for ($i = 3; $i <= $des; $i++) {
    $f[$i] = $f[$i - 1] + $f[$i - 2];
  }
  return $f[$des];
}
echo my_recursive(15);
