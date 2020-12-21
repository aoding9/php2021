<?php
  // strlen() 可以获取字符串字节长度
  // 注意：中文根据编码不同，所占字节也不同 如果php文件保存为gbk编码，中文占2字节，保存为utf8编码，中文占3字节

$str1= '1';  //  1
$str2= "一"; //  3

echo strlen($str1).'<br>'.strlen($str2).'<br>';

// 去php.ini开启 mbstring扩展，专门处理多字节字符串的
echo mb_strlen($str1).'<br>'.mb_strlen($str2).'<br>';  //  这次都是1了