/*
1 字符编码概念

字符（character）是各种文字和符号的总称，包括各国家文字、标点符号、图形符号、数字等。
字符编码（character code）是计算机针对各种符号，在计算机中的一种二进制存储代号，因为计算机只识别这个。

2 字符集概念

字符集（character set）是多个字符的集合，字符集有很多种，常见的有ASCII字符集（英文）、GB2312字符集（简体中文）、BIG5（繁体中文）、GB18030字符集（比较大的简体中文）、Unicode字符集（万国码）。
计算机通过字符编码识别和存储各种文字，计算机最初按照英文单字节字符设计，而中文字数很多，单字节存不下，所以要另外的编码。
编码不同，就可能显示乱码
*/

-- 尝试向utf8的数据库插入中文
insert into teacher values('哈哈',20);
-- ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'inert into teacher values('????',123)' at line 1
-- 错误原因：服务端mysqld.exe不识别客户端mysql.exe的命令(字符集不同，windows的cmd为gbk编码，而服务端没有指定就会使用默认的字符集，utf8);
-- 注：新版的可以自动识别了，不会报错

/*
解决办法：告知服务端客户端使用的字符集为bgk
set names gbk;
*/
set names gbk;

/*
背后原理：
客户端和服务端之间的处理关系分三层：
客户端传给服务端：client
服务端传给客户端：server
客户端与服务端之间的连接层：collection

系统中有三个变量保存了这三层的配置
查看：
*/
show variables like 'character_set_%';

/*
+--------------------------+--------------------------------------------------------+
| Variable_name            | Value                                                  |
+--------------------------+--------------------------------------------------------+
| character_set_client     | gbk                                                    | 对应client 客户端传入命令
| character_set_connection | gbk                                                    | 对应connection 处理客户端和服务端之间的连接
| character_set_database   | utf8                                                   | 数据库字符集
| character_set_filesystem | binary                                                 | 文件系统：二进制
| character_set_results    | gbk                                                    | 对应server 服务端响应结果
| character_set_server     | utf8                                                   | 
| character_set_system     | utf8                                                   |
| character_sets_dir       | D:\phpstudy_pro\Extensions\MySQL5.7.26\share\charsets\ |
+--------------------------+--------------------------------------------------------+
*/
/*
set names gbk;  相当于一次修改了三个变量,即：
set character_set_client = gbk;
set character_set_connection = gbk;
set character_set_results = gbk;

如果只修改client的，那么可以插入成功，但返回的结果会是乱码，因为客户端也不识别
所以至少要修改client和server两个的字符集，而connection的字符集改不改都可以，他是为了方便客户端与服务端进行字符集转换而设
*/
set character_set_client = gbk;
set character_set_results = gbk;
insert into teacher values('哈哈',20);
