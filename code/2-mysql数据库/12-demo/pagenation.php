<?php

/**
 * @page_count:总记录数
 * @page:当前页码
 * @page_size:分页大小
 */
function pagenation($pagecount, $page = 1, $pagesize = 4)
{
  // pages:计算总页数
  $pages = ceil($pagecount / $pagesize);
  # 计算页码数据：使用limit限制
  $offset = ($page - 1) * $pagesize;
  # 拼接limit子句
  $limit = " limit $offset,$pagesize";
  // print_r($limit);

  # 拼接分页html代码
  $pageinfo = "";

  // 拼接链接
  function alink($page, $title, $isCurrent = false)
  {
    $isCurrent =  $isCurrent ? "class='current'" : "" ;
    return "<a " . $isCurrent. "href='index.php?page=$page'>$title</a>";
  }

  # 首页
  $pageinfo .= alink(1, "首页");

  # 判定是否需要上一页，只有当第1页时，才隐藏，其余显示
  if ($page != 1) {
    $prev = $page - 1;
    $pageinfo .= alink($prev, "上一页");
  }

  # 拼接数字部分
  /*   一共最多显示7个可点击数字页面

  * 如果总页数小于等于7页：显示所有页码：1，2，3，4，5，6，7
  * 如果总页数大于7页，显示当前页码左右连贯5页（左右各两页）
    * 当前页码小于等于5：显示前7页，最后增加一个`...`表示有更多页码：1，2，3，4，5，6，7，...
    * 当前页码大于5页：显示前2页（1和2），然后跟`...`，然后显示当前页连贯5页：1，2，...
      * 如果当前页码已经属于最后3页内，显示最后5页数据：1，2，...，6，7，8，9，10
      * 如果当前页码小于最后3页，那么最后增加一个`...`表示有更多页码：1，2，...，5，6，7，8，9，... */
  // 是否为当前页码，重复代码


  // 总记录小于等于7的全显示
  if ($pages <= 7) {
    for ($i = 1; $i <= $pages; $i++) {
      $pageinfo .= alink($i, $i, $page == $i ? true : false);
    }
  } else {
    // 总记录大于7的
    $more = "<a href='javascript:;'>...</a>";
    // 页码小于等于5，追加...
    if ($page <= 5) {
      for ($i = 1; $i <= 7; $i++) {
        $pageinfo .= alink($i, $i, $page == $i ? true : false);
      }
      $pageinfo .= $more;
    } else {
      // 页码大于5
      // 前面必定显示1、2页，和...
      $pageinfo .=  "<a href='index.php?page=1'>1</a><a href='index.php?page=2'>2</a>" . $more;

      // 再根据page的情况判断尾部如何显示
      // 小于等于pages-2(最后一个是pages-0，倒数第3页就是pages-2)，此时显示page前后2页和本身，然后追加...
      if ($page <  $pages - 2) {
        for ($i = $page - 2; $i <= $page + 2; $i++) {
          $pageinfo .= alink($i, $i, $page == $i ? true : false);
        }
        $pageinfo .= $more;
      } else {
        // 大于pages-2说明到了尾部，只需显示最后5页
        for ($i = $page - 4; $i <= $pages; $i++) {
          $pageinfo .= alink($i, $i, $page == $i ? true : false);
        }
      }
    }
  }

  # 判定是否需要增加下一页
  if ($page != $pages) {
    $next = $page + 1;
    $pageinfo .= alink($next, "下一页");
  }

  # 末页
  $pageinfo .= alink($pages, "末页");


  # 将需要用到的变量以数组返回出去
  $pagenation =  [
    'limit' => $limit,
    'pageinfo' => $pageinfo
  ];
  return $pagenation;
}
