<a href='https://blog.csdn.net/qq_37059136/article/details/80278742'>关于printf和sprintf</a>


<?php
/**
 * 1 转换函数
 * implode(连接符,arr)：将一个一维数组的值转化为字符串，两两之间用连接符连接
 * explode(分隔符,str)：将字符串按照分隔符进行切割，返回数组
 * str_split(str[,切割长度])：将字符串转换为数组，按照长度进行切割，默认为1
 */
$a = ['哈哈','呵呵','得的'];
$b = '  西瓜、栗子、菠萝  ';
$c = '123456';
echo implode('-',$a);
echo '<hr>';
var_dump(explode('、',$b));
echo '<hr>';
var_dump(str_split($c,2));
echo '<hr>';



/**
 * 2 首尾过滤函数
 * trim(str[,要去除的字符]) 默认去除两边的空白字符，也可以两边循环去除指定的内容，直到一边不是目标字符为止
 * ltrim(str[,要去除的字符]) 类似地，从左边去除
 * rtrim(str[,要去除的字符]) 类似地，从右边去除
 */
echo '<hr>';
echo trim($b);
echo '<hr>';
echo ltrim($c,'1');
echo '<hr>';
echo rtrim($c,'6');
echo '<hr>';



/**
 * 3 截取函数
 * substr(str,起始位置[,结束位置]) 从指定位置开始截取字符串，可以设置截取长度，默认截取到最后
 * strstr(str,匹配字符) 从首个匹配字符的位置开始，截取到最后
 * 
 * strrchr(str,匹配字符) 查找匹配字符最后一次出现  可以用于取文件后缀名，找小点
 */
$d = '1234567890';
echo '<hr>';
echo substr($d,1,2);
echo '<hr>';
echo strstr($d,'5');
echo '<hr>';



/**
 * 4 大小写转换函数
 * strtolower(str)  字符串转为小写
 * strtoupper(str)  字符串转为大写
 * ucfirst(str)  首字母转为大写
 */
echo '<hr>';
echo strtolower('abCDel');
echo '<hr>';
echo strtoupper('abCDel');
echo '<hr>';
echo ucfirst('abCDel');
echo '<hr>';



/**
 * 6 替换函数
 * str_replace(匹配字符,替换字符,str) 将匹配到的字符进行替换
 */
echo '<hr>';
echo str_replace('1','2',$d);



/**
 * 7 格式化函数
 * printf(格式化字符串,格式化参数1[,格式化参数2,...])  按照格式参数，输出格式化字符串
 * sprintf() 和上面差不多
 * 区别：printf会输出标准输出，即显示到终端屏幕，sprintf是输出到字符串
 * 用格式化参数填充到格式化字符串里的占位符
 * 常用的占位符有（更多在手册sprintf有）：
 * %d 十进制数  %s 字符串  %b 二进制  %o 八进制  %x十六进制
 */
$name = '小明';
$age = 12;
echo '<hr>';
printf('我是%s,今年%d岁',$name,$age);
echo '<hr>';
echo printf('我是%s,今年%d岁',$name,$age); // 后面多了个24
echo '<hr>';
echo sprintf('我是%s,今年%d岁',$name,$age);



/**
 * 8 其他
 * str_repeat(str,重复次数)  重复字符串指定次数
 * str_shuffle(str)   随机打乱字符串（可以做验证码等）
 */
echo '<hr>';
echo str_repeat('123',5);
echo '<hr>';
echo str_shuffle('123456');