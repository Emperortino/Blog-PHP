<?php
    include_once "header.php";

    // 更新数据
    if (@$_POST['sub']){ // 输入判断
        $password = md5(loginsql($_POST['password']));

        $conn->query("update users set password='$password' where username = '$_SESSION[username]'");
//        if($conn->affected_rows){
//            echo "修改成功！！！";
//        }else{
//            echo "修改失败！！！";
//        }
        if($conn->affected_rows>0){
            redirect('1','main.php','密码修改成功！！');
        }else{
            redirect('1','users_edit.php','密码修改失败！！');
        }
    }
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="users_edit.php">密码管理</a><span class="crumb-step">&gt;</span><span>修改密码</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form method="post" onsubmit="return check(this)" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>密码：</th>
                            <td>
                                <input required="required" class="common-text required" id="password" name="password" size="50" type="password">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 mr10" name="sub" value="提交" type="submit">
                                <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                            </td>
                        </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
