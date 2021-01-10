# mySQL
是一个关系型数据库管理系统，由瑞典MySQL AB公司开发，先被Sun公司收购，然后被Oracle收购，现在属于Oracle旗下。

# 为什么用他
- 开源免费
- 对php支持好(wamp、lamp)
- mySQL中的操作指令就是SQL指令，一通万通

# 启动和停止mysql服务
mysql是C/S架构（客户端和服务端）

在安装目录的bin目录
服务端对应：mysqld.exe
客户端对应：mysql.exe

- net start mysql 启动服务
- net stop mysql  停止服务
- services.msc打开服务面板也可以启动服务

# 登录和退出mysql
在bin目录按住shift+鼠标右键打开命令行，使用mysql.exe,或者在系统环境变量中添加bin目录到path中，即可直接使用

参数后面紧跟值，不用空格
- 登录
  - 基本语法：
  - mysql -u用户名 -p密码
  - 密码可以先不输，直接回车再输，就是***密文形式
  
- 其他参数，连接远程mysql服务器用到
  - -h服务器地址   默认本地地址，可以是ip也可以是域名
  - -P端口         默认3306，注意是大写的P

- 退出
**因为mysql数据库连接有上限，所以操作完后要断开连接，以免占用连接数**
退出语句可以省略分号，但是一般分号代表mysql指令的结束，建议带上
第二个比较常用，因为比较短
  - exit;
  - \q;
  - quit;
  

# mysql服务端架构
按照从外往内分几层

- 1.数据库管理系统(最外层)：DBMS，管理服务器端的所有内容
- 2.数据层：DB，用于存储数据的仓库，table的爸爸
- 3.二维数据表：table，用于存储有关联的行列的数据集合，是字段的爸爸
- 4.字段：field，用于规定某一列存储哪种数据

# 常用关键字
- row 行
- column/field 列，字段
- table 数据表表
- database 数据库