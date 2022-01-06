<?php
    include_once "header.php";

    // 显示数据
    $result = $conn->query("select * from config");
    while ($row = $result->fetch_assoc()){
        $web[$row['name']] =  $row['value'];
    }

    // 更新
    if (@$_POST['sub']){
        foreach ($_POST as $name => $value){
            $value = loginsql($value);
            $name = loginsql($name);
            $conn ->query("update config set value = '$value' where name = '$name'");
            if ($conn->error){
                echo "更新失败!!!";
            }
        }
        redirect('1','system.php',"提交成功！！！");


    }


?>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">系统设置</span></div>
        </div>
        <div class="result-wrap">
            <form action="" method="post" id="myform" name="myform">
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>网站信息设置</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody><tr>
                                <th width="15%"><i class="require-red">*</i>域名：</th>
                                <td><input type="text" id="" value="<?php echo $web['website_url']?>" size="85" name="website_url" class="common-text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>站点标题：</th>
                                <td><input type="text" id="" value="<?php echo $web['website_title']?>" size="85" name="website_title" class="common-text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>关键字：</th>
                                <td><input type="text" id="" value="<?php echo $web['website_keyword']?>" size="85" name="website_keyword" class="common-text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>描述：</th>
                                <td><input type="text" id="" value="<?php echo $web['website_desc']?>" size="85" name="website_desc" class="common-text"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input type="submit" name = "sub" value="提交" class="btn btn-primary btn6 mr10">
                                    <input type="button" value="返回" onClick="history.go(-1)" class="btn btn6">
                                </td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>