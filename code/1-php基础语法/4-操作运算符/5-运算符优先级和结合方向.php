<?php
// 运算符优先级

/* 大部分的：

- 一元运算符 》二元运算符 》三元运算符
- 算数运算 》 比较运算  》  位运算  》  逻辑运算  》  赋值运算
- 长得比较像的通常在一起，比如>>和>=，&和&&
- 带有赋值运算的复合运算优先级很低
- 比较运算没有结合方向 */


  // 结合方向
  // 1<2>3; // 没有结合方向的，相同优先级运算符，不可以连在一起使用