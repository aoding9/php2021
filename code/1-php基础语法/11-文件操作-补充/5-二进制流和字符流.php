<?php 
  /**
   * 文件默认以字符流读取,也就是ASCII码,但是图片等文件不能这么传输,需要以二进制的形式
   * 
   * fread(文件资源指针)  二进制读取
   * 由于二进制流没有明确的结束符,当以二进制流读取文件时,需要以文件大小来决定何时结束
   * 另外:file_contents(文件路径) 字符流和二进制流都可以读取
   * 
   * filesize(文件路径)      返回文件大小,可以配合二进制读取使用
   */

   $path = './img.jpg'; // 假如有这个图片
   $fp=fopen($path,'r');
  //  浏览器默认解析成字符串,需要制定文件的类型
   header('content-type:image/jpeg');
   echo fread($fp,filesize($path));
?>