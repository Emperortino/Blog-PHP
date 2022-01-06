<?php
include_once "header.php";
include_once "../common/Page.class.php";

// 删除数据
if (@$_GET['action'] == 'del'){
    $id = $_GET['id'];
    $conn->query("delete from cate where id = $id");
    if($conn->affected_rows>0){
        redirect('1','cate_list.php','删除成功！！');
    }else{
        redirect('1','cate_list.php','删除失败！！');
    }
}

?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">分类管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="cate_add.php"><i class="icon-font"></i>新增分类</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>分类</th>
                            <th>操作</th>
                        </tr>
                        <tr>
                            <?php
                                $result = $conn->query("select * from cate");
                                $result_count = $result->num_rows;
                                while ($row = $result->fetch_assoc()){
                            ?>
<!--                            根据ID 访问 与 修改-->
                            <td><?php echo $row['id'] ?></td>
                            <td title="<?php echo $row['class_name'] ?>"><a target="_blank" href="artcle_edit.php?id=<?php echo $row['id'] ?>" title="<?php echo $row['class_name'] ?>"><?php echo $row['class_name'] ?></a>
                            </td>
                            <td>
                                <a class="link-update" href="cate_edit.php?id=<?php echo $row['id'] ?>">修改</a>
                                <a class="link-del" href="javascript:del(<?php echo $row['id']?>)">删除</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
<script>
    function del(id) {
        if (false == confirm("是否删除当前记录？"))
            return;
        location.href = "?action=del&id="+id;
    }
</script>
</body>
</html>
