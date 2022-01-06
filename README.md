# 博客系统

## 1. 建表
1. 系统表
2. 文章表
3. 分类表
4. 友联表
5. 用户表


## 2. 前台  后台
### 1. init.php

引用页面

### 2. session 验证
php session

如果你使用了 Seesion，或者该 PHP 文件要调用 Session 变量，那么就必须在调用 Session 之前启动它，使用 session_start() 函数。其它都不需要你设置了，PHP 自动完成 Session 文件的创建。

## 注意

### 1. include_once
```php
include_once 'init.php';        // 如果文件已经被包含过 则不会再次包含
```

### 2. seesion 使用失败
```php
Warning: session_start(): Failed to read session data: files (path: /tmp) in 
```

1. 修改下面的 session.save_path 为实际设定路径。如下:

```php
1357 ;session.save_path = "/tmp"
1358 session.save_path = "/usr/local/php/temp"

```

 2. 开启
 ```php
; session.auto_start = 0
session.auto_start = 1
```


### 3. Field 'id' doesn't have a default value
将ID设置为自增！！！

### 4. 编辑器引入 ueditor
引入ueditor，编辑如下：

```html
<html>
<head>
    ................
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <script src="/ueditor/ueditor.config.js">/*引入配置文件*/</script>
    <script src="/ueditor/ueditor.all.js">/*引入源码文件*/</script>
     .............
</head>
<body>
    ................
    <textarea id="content" rows="10" cols="70" style="border:1px solid #E5E5E5;">55222</textarea>    
    <script type="text/javascript">
        UE.getEditor("content");//实例化编辑器  传参,id为将要被替换的容器。
    </script>
</html>
```


### 5. session_start()警告
php中警告提示A session had already been started – ignoring session_start() 解决方法
问题代码：

```php
session_start();
```

这样写，其实不是错的，只是缺少了判断，因为有些用户已经在本站录入了session，再次请求就会重复，php爆出这个警告提示，是为了避免更多问题以及性能和安全！
解决这个问题很简单，写个判断呗！
判断 如果session_id 不存在,说明没有储存, 打开session，否则。。。。不多说了，下面代码替换吧
```php
if (!session_id()) session_start();
```

### 6. PHP 中提示undefined index如何解决
在出现notice代码之前加上@

@表示这行有错误或是警告不要输出例如

```php
@$username=$_post['username'];
```

在变量前面 加上一个@，如 

```php
if (@$_GET['action']=='save') { ...
```


这样若这条语句出现了警告提醒也不会进行输出