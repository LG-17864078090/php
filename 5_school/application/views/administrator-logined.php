<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>管理员页面</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/administrator-logined.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>

    <div class="main">
        <div class="operating"><a href="welcome/announcement">公告发布</a></div>

        <div class="operating"><a href="welcome/course_manage">课程管理</a></div>
        <div class="operating">教学资源分配</div>
        <div class="operating"><a href="welcome/change_school_info">学校信息修改</a></div>
    </div>

    <?php include 'footer.php'?>

</div>


</body>
</html>
