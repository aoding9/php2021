<pre>
<?php

/*
* 文件写入

注意点:
1 如果文件不存在,会自动创建
2 写操作是清空了之后再写入,原来的内容没有了
3 \r\n需要双引号字符串才转义
*/
$str = '哈哈哈\r\n呵呵呵' . "\r\n双引号才转义换行"; // 单引号不会转义

file_put_contents('./test.txt', $str);
// file_put_contents('./test.txt','123'); // 原来的内容没有了


/**
 * 文件读取
 * 
 * 方法1 file_get_contents(文件路径); 整个文件读入一个字符串,并返回
 * 方法2 read_file(文件路径);  读取并输出文件内容
 * 
 * readfile 就是 each file_get_contents
 */
echo file_get_contents('./test.txt');
readfile('./test.txt');
echo "<hr>";

/**
 * 打开文件
 * 
 * fopen(文件路径,模式)  以某种模式打开文件,返回文件指针 资源类型
 * r:读  read       目标文件不存在会报错
 * w:写  write      目标文件不存在会自动创建   写模式,是清空再写,
 * a:追加  append   不清空,在末尾追加内容
 */

/**
 * 文件资源指针操作
 * fputs(文件指针,内容)   写入一行,同一个文件流,第一次调用会清空原内容,再调用则是追加
 * fclose(文件指针)   关闭文件
 * fgets(文件指针)    读取文件  一次一行
 */


# 写模式实例
$fp = fopen('./test.txt', 'w'); # 以写模式打开test.txt
//  var_dump($fp);  // resource(6) of type (stream)
fputs($fp, "我是新写入的第一行\r\n嗯嗯");
fputs($fp, '我是写入的第二行');
fclose($fp); // 关闭

// 读模式实例
$fp = fopen('./test.txt', 'r');  # 只读模式打开文件
echo fgets($fp);   // 一次读取一行
echo fgets($fp);   // 一次读取一行
fclose($fp);
echo "<hr>";

// 追加模式实例
$fp = fopen('./test.txt', 'a');  # 追加模式打开文件
fputs($fp, "\r\n我是后来追加的");
fclose($fp); // 关闭
readfile('./test.txt');
