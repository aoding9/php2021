/* 
1.选择数据库，切换当前数据库
语法： use dbname;

2.修改数据库（修改库选项,mysql5.5之前的rename命令可以改名字，后面不能改了）
语法： alter database dbname [charset 字符集] [coll 校对集];
一般开始放数据后就不再修改了

3.删除数据库
语法： drop database dbname;
删除前最好确保里面的数据可以删在操作，以及备份什么的，防止出问题
 */