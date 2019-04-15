<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>公告详情</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/announcement-detail.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="change">

        </div>
        <div class="container">
            <div class="change">
                <?php if(isset($prev)){?>
                    <button class="pre"><a href="welcome/announcement_detail/<?php echo $prev->id;?>">上一篇</a></button>
                <?php }?>
                <h1 class="title"><?php echo $announce->title?></h1>

                <?php if(isset($next)){?>
                    <button class="next"><a href="welcome/announcement_detail/<?php echo $next->id;?>">下一篇</a></button>
                <?php }?>
            </div>
            <p class="time"><?php echo $admin->name?>发表于<?php echo $announce->time?></p>
            <p class="content"><?php echo $announce->content?></p>
        </div>
    </div>

    <div class="footer">© 学生学情管理系统</div>

</div>


</body>
</html>