<?php
// 权限监测
//include_once "init.php";

if (@!$_SESSION['username']){
    redirect('0','login.php','无访问权限！！！');
    exit;   // 让下面的页面无法显示
}
?>