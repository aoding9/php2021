/*
数据插入：将数据以SQL的形式存储到指定的数据表字段里面
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