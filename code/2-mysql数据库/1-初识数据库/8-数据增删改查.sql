/*
1 数据插入：将数据以SQL的形式存储到指定的数据表字段里面
关键字：insert into
*/

-- 方式1：向表中指定字段插入数据
-- 语法： insert into 表名[(字段列表)] values(对应的值列表);
-- values中的值与字段列表的顺序要一一对应，不一定要与表结构对应

create table teacher(
  name varchar(10),
  age int
)charset utf8;

insert into teacher(name,age) values('anne',20);


-- 方式2：向表中所有字段插入数据
-- insert into 表名 values(值列表，对应表结构，顺序也要一样);
insert into teacher values('lihua',30);



/*
2 查询数据
关键字：select from 
*/
-- 查询表中所有字段
select * from teacher;

-- 查询表中指定字段，用逗号分隔
-- 从teacher表中查找name和age字段
select (name,age) from teacher;

-- 简单的条件查询
-- 从teacher表中查找name字段，并且匹配年龄age=100的那一行记录
-- mysql没有==，直接=即可
select name from teacher where age = 100;


/*
3 删除数据
关键字：delete from
delete from 表名 [where 条件];
如果不加条件，会删除所有数据，需要谨慎操作哦
*/
-- 删除了年龄100岁的老师
delete from teacher where age = 100;




/*
4 更新数据（修改数据）
关键字： update set
语法：updata 表名 set 字段名 = 新的值 [where 条件];
如果没有条件，那么所有行的该列都会修改为新的值
*/
-- 修改年龄为20的老师的名字为jack
update teacher set name = 'jack' where age = 20;
