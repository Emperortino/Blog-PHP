<?php

include_once "header.php";

// session验证
//if ($_SESSION['username']){
//    echo $_SESSION['username'];
//}else{
//    echo "验证失败！！！";
//}

if (@$_GET['action'] == 'logout') {
    session_destroy();   //清理session
    redirect('1', 'login.php', '退出成功！！');
}

?>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>欢迎使用『Fun』博客程序，分享生活。</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
<!--                    <a href="insert.html"><i class="icon-font">&#xe001;</i>新增作品</a>-->
                    <a href="artcle_add.php"><i class="icon-font">&#xe005;</i>新增文章</a>
                    <a href="flink_list.php"><i class="icon-font">&#xe048;</i>友情链接</a>
                    <a href="cate_list.php"><i class="icon-font">&#xe041;</i>新增分类</a>
<!--                    <a href="#"><i class="icon-font">&#xe01e;</i>作品评论</a>-->
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info"><?php echo php_uname('s')?></span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info"><?php echo $_SERVER['SERVER_SOFTWARE']?></span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info"><?php echo php_sapi_name()?></span>
                    </li>
                    <li>
                        <label class="res-lab">Fun-版本</label><span class="res-info">v-0.1</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info"><?php echo ini_get("upload_max_filesize")?></span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info"><?php echo date("Y-m-d H:i:s",$_SERVER['REQUEST_TIME']) ?></span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info"><?php echo $_SERVER['HTTP_HOST']?> [ <?php echo $_SERVER['SERVER_ADDR']?> ]</span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info"><?php echo $_SERVER['HTTP_HOST']?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
