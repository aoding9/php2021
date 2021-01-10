/*
1.修改数据表属性（即修改表选项）
alter table 表名 表选项 [=] 值;
*/
alter table student charset gbk;
-- 查看有没有被修改
show create table student\G

-- 如果数据库已经插入数据了，尽量不要修改表选项，不然可能出现意外情况

/*
2 修改表结构 
-- 数据库中数据表名字通常由前缀：取数据库的前两个字母加_
*/


/* 
2.1修改表名  rename to
*/
rename table student to db1_student;


/*
2.2 新增字段   add
alter table 表名 add [column] 新字段名 列类型 [列属性] [位置，即first/after 字段名];
*/
-- 给学生表增加age字段
alter table db1_student add age int;

/*
字段位置
first:放在最前面
after:放在某个字段之后，不写默认放到最后一个字段之后
*/
alter table db1_student add id int first;


/*
2.3修改字段名  change
alter table 表名 change 旧字段名 新字段名 字段类型 [列属性] [新位置];
修改字段名需要重新指定字段类型，不会沿用旧的类型
*/
alter table db1_student change age db1_age int;

/*
2.4修改字段类型（属性）  modify
alter table 表名 modify 字段名 新类型 [新属性] [新位置];
*/
alter table db1_student modify id int(20);



/*
2.5 删除字段  drop
alter table 表名 drop 字段名;
 */
 alter table db1_student drop db1_age;


 /*
 3 删除数据表
 drop table 表名[,表名2...] 可以同时删除多个数据表

 */
 drop table class;