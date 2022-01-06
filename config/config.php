<?php

//  启动 Session
if (!session_id()) session_start();

// 数据库 配置信息
$username = "www_fun_com";
$password = "www_fun_com";
$host = "localhost";
$dbname = "www_fun_com";

// 连接
$conn = mysqli_connect($host,$username,$password,$dbname);

$result = $conn->connect_error;
// 连接判断
if ($conn->connect_error){      // 如果连接出错 显示出错信息
    die("数据库连接失败！！！".$conn->connect_error);
}

$conn->query("set names utf8");

?>