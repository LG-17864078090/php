<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>教师管理页面</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/teacher-logined.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="operating"><a href="welcome/show_teacher_info">个人信息查询</a></div>
        <div class="operating"><a href="welcome/help_reg">辅助注册</a></div>
        <div class="operating"><a href="welcome/my_course">我的课程</a></div>
        <div class="operating"><a href="welcome/my_student">学生课程管理</a></div>
        <div class="operating"><a href="welcome/show_feedback">查看反馈</a></div>


    </div>

    <?php include 'footer.php'?>

</div>


</body>
</html>