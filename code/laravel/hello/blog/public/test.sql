create database hello;
use hello;
-- 创建一个测试的表
create table member(
  id int primary key auto_increment,
  `name` varchar(32) not null,
  age tinyint unsigned not null,
  email varchar(32) not null
) engine myisam charset utf8;