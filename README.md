Yaconf support for ThinkPHP 6.0
===============


安装

~~~
composer require topthink/think-yaconf
~~~


然后在app目录下面的provider.php中配置

~~~
'think\Config'	=>	'think\Yaconf',
~~~

你可以指定Yaconf的某个文件作为项目的统一配置文件

~~~
think\facade\Config::setYaconf('file_name');
~~~