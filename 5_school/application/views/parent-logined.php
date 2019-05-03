<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>家长用户页面</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/parent-logined.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <?php include 'search.php'?>
        <div class="operating" id="info"><a href="welcome/show_parent_info">个人信息查询</a></div>
        <div class="operating" id="grade"><a href="welcome/show_child_grade">学生成绩查询</a></div>
        <div class="operating" id="feedback"><a href="welcome/feedback">信息反馈</a></div>
    </div>

    <?php include 'footer.php'?>

</div>
</body>
</html>