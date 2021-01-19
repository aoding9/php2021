# 创建数据库
create database news charset utf8;

# 创建数据表
create table news.author(
	id int primary key auto_increment,
    name varchar(50) not null,
    platform varchar(50) comment '发布平台'
)charset utf8;
insert into news.author values(null,'佚名','佚名自媒体'),
(null,'留白','海上自媒体'),(null,'花田错','音乐自媒体');

create table news.news(
	id int primary key auto_increment,
    title varchar(50) not null comment '新闻标题',
    content text not null comment '新闻内容',
    a_id int unsigned not null comment '作者id',
    publish int unsigned not null comment '发布时间'
)charset utf8;

-- 蠕虫复制
insert into news.news(title,content,a_id,publish) select title,content,a_id,publish from news.news;

-- 清除数据
TRUNCATE news.news;