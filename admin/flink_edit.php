<?php
    include_once "header.php";

    $id = loginsql($_GET['id']);
    $result = $conn->query("select * from flink where id = '$id'");
    $row = $result->fetch_assoc();

    // 更新数据
    if (@$_POST['sub']){ // 输入判断
        $url_name = loginsql($_POST['url_name']);
        $url = loginsql($_POST['url']);

        $conn->query("update flink set url_name='$url_name',url = '$url' where id = '$id'");
//        if($conn->affected_rows){
//            echo "修改成功！！！";
//        }else{
//            echo "修改失败！！！";
//        }
        if($conn->affected_rows>0){
            redirect('1','flink_list.php','修改成功！！');
        }else{
            redirect('1','flink_edit.php','修改失败！！');
//            redirect('2','artcle_list.php','修改失败！！');
        }
    }
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="flink_list.php">友链管理</a><span class="crumb-step">&gt;</span><span>编辑作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form method="post" onsubmit="return check(this)" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>网站名称：</th>
                            <td>
                                <input required="required" class="common-text required" id="url_name" name="url_name" size="50" value="<?php echo $row['url_name']?>" type="text">
                            </td>
                        </tr>

                        <tr>
                            <th><i class="require-red">*</i>网站URL：</th>
                            <td>
                                <input required="required" class="common-text required" id="url" name="url" size="50" value="<?php echo $row['url']?>" type="text">
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
