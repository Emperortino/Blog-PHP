<?php
    include_once "header.php";
    $result = $conn -> query("select * from article where id = '$_GET[id]'");
    $row = $result->fetch_assoc();

    $conn ->query("update article set click_num = click_num+1  where id='$_GET[id]' ")


?>
<div class="lyear-wrapper">
    <section class="mt-5 pb-5">
        <div class="container">

            <div class="row">
                <!-- 文章阅读 -->
                <div class="col-xl-8">
                    <article class="lyear-arc">
                        <div class="arc-header">
                            <h2 class="arc-title"><a href="#"><?php echo $row['title'] ?></a></h2>
                            <ul class="arc-meta">
                                <li><i class="mdi mdi-calendar"></i><?php echo date("Y-m-d H:i:s",$row['c_time']) ?></li>
                                <li><i class="mdi mdi-tag-text-outline"></i> <a href="#"><?php echo $row['keyword']?></a></li>
                                <li>🔥 <a href="#"><?php echo $row['click_num']?> 人气</a></li>

                            </ul>
                        </div>

                        <div class="lyear-arc-detail">
                            <p><?php echo $row['content']?></p>

                        </div>

                    </article>
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
<script type="text/javascript" src="js/highlight/highlight.pack.js"></script>
<script type="text/javascript" src="js/main.min.js"></script>
<script type="text/javascript">hljs.initHighlightingOnLoad();</script>
</body>
</html>
