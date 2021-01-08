<pre>
<?php
  

/**
 * 2 指针函数
 * reset() 重置指针，指向首位
 * end() 重置指针，指针指向数组末位
 * next() 指针下移 获取下一个元素的值
 * prev() 指针上移 获取上一个元素的值
 * current() 返回当前指针对应的值
 * key() 返回当前指针对应键名
 */

 /**
  * 注意： next和prev可能导致指针移动到数组之外，无法通过next和prev回到原数组，此时用重置函数reset和end即可
  */

 $arr=[3,5,2,7,8,0];
 echo "current:".current($arr)."\n"; 
 echo "key:".key($arr)."\n"; 
 echo "next:".next($arr)."\n"; 
 echo "end:".end($arr)."\n"; 
 echo "prev:".prev($arr)."\n"; 
 echo "reset:".reset($arr)."\n"; 