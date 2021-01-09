/* 
1.创建数据表
语法： create table 表名(字段名 字符安类型 [字段属性], 字段名2 字段类型 [字段属性], ...) [表选项];
需要选择创建到哪个数据库，可以先use数据库，也可以这么创建：在表名前面用dbname.连接
-- 通过数据库名.表名，可以访问不同数据库中的表
*/
create table dbname1.class(
-- 字段名 字段类型：10个字符，约束字段值不能超过10个字符
  name varchar(10)
);

/*
2表选项
engine 存储引擎：默认的是innodb,5.5以前是myisam
charset 字符集：只对自己有效，优先级比数据库选项的高
collate 校对集
*/
use dbname1;
create table student(
  name varchar(10)

)
-- engine [=] innodb/myisam charset utf8;
charset utf8;

/*
3复制已有表结构，来创建数据表，（不复制数据）
create table 新表名 like 源表名;
*/
-- 在dbname2数据库下复制dbname1数据库中的student数据表
use dbname2;
create table student like dbname1.student;

/*
4显示数据表
每当创建一个数据表时，会在对应的文件夹下面创建一些文件，与存储引擎有关
比如这里就有一个student.frm文件，是结构文件，来自innodb存储引擎，具体的数据统一放在另一个地方：data目录下的ibdata文件中，如果一个存不下，会有ibdata2...
*/
-- 显示所有表
show tables;

-- 匹配显示表
show tables like 's%'; -- 显示以s开头的表

/*
5显示表结构：查看表中包含的字段信息（名字，类型，属性等）
有三种方式可以看
describe 表名;
desc 表名;
show columns from 表名;
*/
describe student;
desc student;
show columns from student;
/* 查询结果：
+-------+-------------+------+-----+---------+-------+
| Field | Type        | Null | Key | Default | Extra |
+-------+-------------+------+-----+---------+-------+
| name  | varchar(10) | YES  |     | NULL    |       |
+-------+-------------+------+-----+---------+-------+
1 row in set (0.00 sec)

field：字段名
type：字段类型
null：是否允许为空
key：是否为索引
default：字段默认值
extra：额外的属性
*/

/*
6查看表创建语句（是加工过的）
*/
show create table student;

/* 当语句很长的时候，格子没有对齐可读性不太会，可以使用另一种语句结束符
+---------+-------------------------------------------------------------------------------------------------+
| Table   | Create Table                                                                                    |
+---------+-------------------------------------------------------------------------------------------------+
| student | CREATE TABLE `student` (
  `name` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 |
+---------+-------------------------------------------------------------------------------------------------+
*/


/*
7 mysql三种语句结束符：
;与\g的效果一样，字段在上，值在下，可以改为\G,字段在左，值在右
*/
show create table student\G
/* 这样就看的清楚多了
*************************** 1. row ***************************
       Table: student
Create Table: CREATE TABLE `student` (
  `name` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8
*/


