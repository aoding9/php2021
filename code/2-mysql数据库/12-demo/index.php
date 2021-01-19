<?php
# 新闻列表（主页）

// 1 根据模板，获取需要的数据：新闻id、标题、内容、作者姓名、发布时间
# 加载封装的sqli操作函数
include 'sql_func.php';

# 连接初始化
$conn = connect('root', 'root', 'news', $error);
if (!$conn) die($error);


// 文章分页
# 获取总记录数
include_once 'sql_func.php';
$sql = 'select count(*) as total from news';
$res = read($conn, $sql, $error);
if (!$res) die("获取文章记录数失败");

# 分页参数
$pagecount = $res['total'] ?? 0;
$page = $_GET['page'] ?? 1;
$pagesize = 4;

include 'pagenation.php';
$pagenation = pagenation($pagecount, $page, $pagesize);
// print_r($pagenation);


// 查询文章
# 组织数据SQL，获取数据，由于需要连表查询，所以用普通查询，由于是查询所有，所以传入true
# 查询主体：新闻，关联主体：作者。  左连接，关联关系：news.a_id=author.id
# news别名n，author别名a

# 拼凑原来获取数据的SQL，使得数据分页效果实现
# 连接查询之后，系统会默认按照连接条件进行升序排序，需要调整为新闻id升序排序
$sql = "select n.*,a.name from news n left join author a on n.a_id = a.id order by n.id".$pagenation['limit'];
$news = read($conn, $sql, $error, true);

// print_r($news); 查看是否获取成功



// 加载首页模板
include "index.htm";
