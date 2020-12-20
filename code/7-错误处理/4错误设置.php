<pre>
  设置是否显示错误，以及显示什么级别的错误

方式一：
  打开php.ini全局配置文件，修改以下两项
  display_errors: On/Off
  error_reporting: 错误级别

方式二：
  在php脚本中，使用php的相关函数设置
  error_reporting([错误级别])  设置显示的错误级别，如果不传的话则返回当前配置显示哪些错误级别

  ini_set(配置项,配置值);   修改配置
  exempli gratia（例如 eg）
  ini_set('display_errors',1);
  ini_set('error_reporting',E_ALL);

  注意：脚本中的配置修改比配置文件级别更高
</pre>
<?php
  