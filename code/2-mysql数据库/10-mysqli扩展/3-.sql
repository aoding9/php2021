-- vscode可以安装sql tools来方便sql操作，格式化，代码提示等

-- 创建数据表
create table db1.tb1(
  id int primary key auto_increment,
  name varchar(20),
  gender char(4),
  age tinyint ,
  class_name varchar(20)
);

select * from tb1;