<?php
    include_once "header.php";

    if (@$_POST['sub']){ // 输入判断
        $tilte = loginsql($_POST['title']);
        $author = loginsql($_POST['author']);
        $keyword = loginsql($_POST['keyword']);
        $content = loginsql($_POST['content']);
        $c_time = time();
        $cateid = loginsql($_POST['cateid']);

        $conn->query("insert into article (title,author,content,keyword,c_time,cateid) value ('$tilte','$author','$content','$keyword','$c_time','$cateid')");
//        if($conn->affected_rows){
//            echo "增加内容成功！！！";
//        }else{
//            echo "增加内容失败！！！";
//        }
        if($conn->affected_rows>0){
            redirect('1','artcle_list.php','增加内容成功！！');
        }else{
            redirect('1','artcle_add.php','增加内容失败！！');
        }
    }


?>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="artcle_list.php">文章管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form method="post" onsubmit="return check(this)" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="cateid" id="cateid" class="required">
                                    <option value="">请选择</option>
                                    <?php
                                        $cate_result = $conn->query("select * from cate");
                                        while ($row = $cate_result->fetch_assoc()) //循环遍历
                                        {
                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['class_name']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>标题：</th>
                            <td>
                                <input required="required" class="common-text required" id="title" name="title" size="50" value="" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th>作者：</th>
                            <td><input class="common-text" name="author" size="50" value="admin" type="text"></td>
                        </tr>
                        <tr>
                            <th>关键字：</th>
                            <td><input class="common-text" name="keyword" size="50" type="text" placeholder="请输入关键字以空格或者逗号隔开隔开"></td>
                        </tr>
                        <tr>
                            <th>内容：</th>
                            <td><textarea required="required" name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10">
                                </textarea>
                                <script type="text/javascript">
                                    UE.getEditor("content");//实例化编辑器  传参,id为将要被替换的容器。
                                </script>
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
