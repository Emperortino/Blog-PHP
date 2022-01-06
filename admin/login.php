<?php
include_once 'init.php';        // 如果文件已经被包含过 则不会再次包含



if (@$_POST['sub']){
    $username = loginsql($_POST['username']);

// 密码要md5加密
    $password = loginsql(md5($_POST['password']));

// 查询
    $result = $conn->query("select * from users where username = '$username' and password = '$password'");
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if ($row['password'] == $password){     // 判断输入的密码 与 查询到数据库的密码进行对比
//            var_dump($row);       //输出数据
            // 登录成功后 给一个session
            //  声明一个名为 username 的变量，并赋空值。
            $_SESSION["username"] = $row['username'];

//            echo "登录成功！！！";
            header("Location: main.php");   // 成功后 跳转到 main 页面
        }else{
            echo "<script>alert('账户密码错误！！！')</script>";
        }
    }else{
        echo "<script>alert('账户密码错误！！！')</script>";
    }

}



?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>『Fun』博客中心</title>
    <style>
        .login{
            width: 400px;
            margin: 0px auto;
            margin-top: 30px;
        }
    </style>
    <script>
        // 前端校验
        function check(form) {
            var　username = form.username.value;
            if (username.length==0){
                alert("用户不能为空");
                form.username.focus();
                return false;
            }
            var　password = form.password.value;
            if (password.length==0){
                alert("密码不能为空");
                form.password.focus();
                return false;
            }
        }

    </script>
    <link rel="stylesheet" type="text/css" href="css/admin_login.css"/>
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="" method="post" onsubmit="return check(this)">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" id="username" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" id="password" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" name="sub" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>


<!--<html>-->
<!--    <head>-->
<!--        <title>-->
<!--            管理员登录-->
<!--        </title>-->
<!--        <style>-->
<!--            .login{-->
<!--                width: 400px;-->
<!--                margin: 0px auto;-->
<!--                margin-top: 30px;-->
<!--            }-->
<!--        </style>-->
<!--        <script>-->
<!--            // 前端校验-->
<!--            function check(form) {-->
<!--                var　username = form.username.value;-->
<!--                if (username.length==0){-->
<!--                    alert("用户不能为空");-->
<!--                    form.username.focus();-->
<!--                    return false;-->
<!--                }-->
<!--                var　password = form.password.value;-->
<!--                if (password.length==0){-->
<!--                    alert("密码不能为空");-->
<!--                    form.password.focus();-->
<!--                    return false;-->
<!--                }-->
<!--            }-->
<!---->
<!--        </script>-->
<!--    </head>-->
<!--    <body>-->
<!--        <div class="login">-->
<!--            <form method="post" onsubmit="check(this)">-->
<!--                <table>-->
<!--                    <tr>-->
<!--                        <td><label for="username">用户 <input name="username" type="text" id="username" /></label></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><label for="password">密码 <input name="password" type="password" id="passwords" /></label></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td colspan="2"><input type="submit" value="登录" name="sub" /></td>-->
<!--                    </tr>-->
<!---->
<!--                </table>-->
<!---->
<!---->
<!--            </form>-->
<!--        </div>-->
<!--    </body>-->
<!---->
<!--</html>-->
