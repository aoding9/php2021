-- 两个短杠表示注释
/* 也可以块注释奥~~(⊙﹏⊙)~~
阿萨德as */

-- DBMS数据库管理系统 相关

/*
 1.创建数据库
显示query OK表示成功执行 
*/
create database dbname1;

/*
库选项
设置该数据库中存储数据的默认字符集和校对集，如果不指定则是mysql安装时的默认设置
语法：
charset 字符集
coll 校对集
*/

create database dbname2 charset utf8;

-- 创建之后，系统自动在mysql设置的data存放目录中创建一个同名文件夹，其中有一个db.opt文件，保存有库选项


/*
2.显示所有数据库
*/
show databases;

-- mysql是核心数据库，保存了权限关系，密码验证等
-- performance_schema是效率库，可以看数据库的效率信息
-- information_schema保存了数据库所有的结构信息（表和库，字段），可以用来查找字段在哪个表里

/*
显示部分数据库
基本语法 show databases like '匹配模式'
_:匹配当前位置单个字符
%:匹配指定位置多个字符

举例：获取以my开头的数据库:
show databases like 'my%';
获取以my开头，后面跟一个字符，然后跟db的数据库，比如my1db myadb等等
show databases like 'my_db';

*/
show databases like 'my%';


/*
查看数据库的创建语句
show create database dbname;
注意，这个语句是经过加工后的，可以看库选项等
*/
show create database dbname1;
-- CREATE DATABASE `dbname1` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */