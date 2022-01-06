<?php
//include_once 'header.php';
?>
<div class="col-xl-4">
    <div class="lyear-sidebar">
        <!-- 热门文章 -->
        <aside class="widget widget-hot-posts">
            <div class="widget-title">热门文章</div>
            <?php
            $result = $conn->query("select * from article order by click_num desc limit 5");
            while ($row = $result->fetch_assoc()){

                ?>
                <ul>
                    <li>
                        <a href="post.php?id=<?php echo $row['id']?>"><?php echo $row['title'] ?></a> <span><?php echo "发布时间：".date("Y-m-d H:i:s",$row['c_time']) ?> || 🔥  <a href="#"><?php echo $row['click_num']?> 人气</a></span>
                    </li>
                </ul>
                <?php
            }
            ?>
        </aside>

        <!-- 归档 -->
        <aside class="widget">
            <div class="widget-title">友链</div>
            <ul>
                <?php
                $result = $conn->query("select * from flink");
                while ($row = $result->fetch_assoc()){
                    ?>
                    <li><a href="<?php echo $row['url']?>"><?php echo $row['url_name']?></a> 👈</li>
                    <?php
                }
                ?>
            </ul>
        </aside>
    </div>
</div>
