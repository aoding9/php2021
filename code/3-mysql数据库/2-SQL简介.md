# SQL介绍

结构化查询语言（structured query language），简称SQL，是一种数据库查询和程序设计语言，用于存取数据，以及查询、更新和管理关系数据库系统，同时也是数据库脚本文件的扩展名

简单来说SQL就是专门用于操作关系型数据库的一门语言

# 分类
分为5类
- 数据查询语言（DQL:data query language)
  - 也称为数据检索语句，从数据表中获得数据。
  - 常用指令：select, show, where, order by, group by, having
- 数据操作语言(DML:data manipulation language)
  - 对数据进行操作，也称为动作查询语句
  - 常用：insert 插入, update 修改, delete 删除
- 事务处理语言(TPL，T是transaction)
  - 用于事务安全处理，确保被DML语句影响的表和行及时更新，以及进行回滚等事务操作
  - 常用：begin transaction, commit, rollback
  - 不是所有关系型数据库都提供事务安全处理
- 数据控制语言(DCL)
  - 用于权限管理，给予和删除用户的各种权限
  - 常用：grant 授予权限, revoke 移除权限
- 数据定义语言(DDL)
  - 数据结构管理，创建、删除数据表，修改数据表结构
  - 常用：create创建, drop删除,alter修改

