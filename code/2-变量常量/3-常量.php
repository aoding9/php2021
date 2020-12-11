<?php
// 常量定义后一般不能修改
// 定义方式1
define('PI', 3.14);
// 定义方式2
const PI2 = 3.1;

// 命名规则
// 不需要$符号
// 一般由字母数字下划线组成，不能数字开头
// 通常用大写字母，以便和变量区分

// define可以定义常量，可以使用特殊符号常量
define('^_^', 'smile');
// const不可以
// const ^_^ = 'smile';

// 使用常量
// 直接写常量名
echo PI;
// 如果使用有特殊符号名字的常量，需要用访问常量的函数
echo constant('^_^');


// 系统常量
echo '<br>', PHP_VERSION, '<br>', PHP_INT_SIZE, '<br>', PHP_INT_MAX;

// 魔术常量
echo '<br>', __DIR__, '<br>', __FILE__, '<br>', __LINE__;
echo '<br>', __LINE__;
