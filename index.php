<?php
    include_once 'header.php';
?>
<style>
    .Icontent{
        text-overflow: -o-ellipsis-lastline;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
    }
</style>
<div class="lyear-wrapper">
    <section class="mt-5 pb-5">
        <div class="container">

            <div class="row">
                <!-- 文章列表 -->
                <div class="col-xl-8">
                    <?php
                    include_once "common/Page.class.php";
                    $page = isset($_GET['page'])?$_GET['page']:1;   // 页数
                    $subPages = 6;  //每页显示的内容数

                    $begin =  ($page-1)*$subPages;      // 进行调整
                    $result = $conn->query("select a.id,a.title,a.click_num,a.content,a.keyword,a.author,c.class_name,a.c_time from article as a,cate as c where a.cateid=c.id order by a.id desc  limit $begin,$subPages");
                        $result_count = $result->num_rows;
                        while ($row = $result->fetch_assoc()){
                     ?>

                    <article class="lyear-arc">
                        <div class="arc-header">
                            <h2 class="arc-title"><a href="post.php?id=<?php echo $row['id'] ?>"><?php echo $row['title']?></a></h2>
                            <ul class="arc-meta">
                                <li><i class="mdi mdi-calendar"></i> <?php echo date("Y-m-d H:i:s",$row['c_time']) ?></li>
                                <li><i class="mdi mdi-tag-text-outline"></i><?php echo $row['class_name']?></li>
                                <li><i class="mdi mdi-tag-text-outline"></i><?php echo $row['keyword']?></li>
                                <li>🔥 <a href="#"><?php echo $row['click_num']?> 人气</a></li>
                            </ul>
                        </div>

                        <div class="Icontent">

                            <p><?php echo $row['content']?></p>
                        </div>
                    </article>

                    <?php
                        }
                    ?>

                    <!-- 分页 -->
                    <div class="list-page">
                        <?php
                        $result_2 = $conn->query("select * from article as a,cate as c where a.cateid=c.id order by a.id desc");
                        $result_count = $result_2->num_rows;
                        $p = new Page($result_count,8,$page,$subPages);
                        echo $p->showPages(1);
                        ?>
                    </div>
                    <!-- 分页 end -->
                </div>
                <!-- 内容 end -->

                <!-- 侧边栏 -->
                <?php
                    include_once "sidebar.php";
                ?>

                <!-- 侧边栏 end -->
            </div>

        </div>
        <!-- end container -->
    </section>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.min.js"></script>
</body>
</html>
