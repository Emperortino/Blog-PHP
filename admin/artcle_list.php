<?php
include_once "header.php";
include_once "../common/Page.class.php";

$page = isset($_GET['page'])?$_GET['page']:1;   // 页数
$subPages = 8;  //每页显示的内容数

// 删除数据
if (@$_GET['action'] == 'del'){
    $id = $_GET['id'];
    $conn->query("delete from article where id = $id");
    if($conn->affected_rows>0){
        redirect('1','artcle_list.php','删除成功！！');
    }else{
        redirect('1','artcle_list.php','删除失败！！');
    }
}

?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="artcle_add.php"><i class="icon-font"></i>新增作品</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>点击</th>
                            <th>发布人</th>
                            <th>分类</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <tr>
                            <?php
                                $begin =  ($page-1)*$subPages;      // 进行调整
                                $result = $conn->query("select a.id,a.title,a.click_num,a.author,c.class_name,a.c_time from article as a,cate as c where a.cateid=c.id order by a.id desc limit $begin,$subPages");
                                $result_count = $result->num_rows;
                                while ($row = $result->fetch_assoc()){
                            ?>
<!--                            根据ID 访问 与 修改-->
                            <td><?php echo $row['id'] ?></td>
                            <td title="<?php echo $row['title'] ?>"><a target="_blank" href="artcle_edit.php?id=<?php echo $row['id'] ?>" title="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></a>
                            </td>
                            <td><?php echo $row['click_num'] ?></td>
                            <td><?php echo $row['author'] ?></td>

                            <td><?php echo $row['class_name'] ?></td>
                            <td><?php echo date("Y-m-d H:i:s",$row['c_time']) ?></td>
                            <td>
                                <a class="link-update" href="artcle_edit.php?id=<?php echo $row['id'] ?>">修改</a>
                                <a class="link-del" href="javascript:del(<?php echo $row['id']?>)">删除</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <div class="list-page">
                        <?php
                            $result_2 = $conn->query("select * from article as a,cate as c where a.cateid=c.id order by a.id desc");
                            $result_count = $result_2->num_rows;
                            $p = new Page($result_count,8,$page,$subPages);
                            echo $p->showPages(1);
                        ?>
                    </div>
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
