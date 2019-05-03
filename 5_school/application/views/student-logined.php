<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>学生用户页面</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/student-logined.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="search">
            <input type="text" placeholder="在公告中查询你想要的通知"><button>搜索</button>
        </div>

        <div class="operating" id="info"><a href="welcome/show_student_info">个人信息查询</a></div>
        <div class="operating" id="grade"><a href="welcome/show_student_grade">个人成绩查询</a></div>
        <div class="operating" id="chooseCourse"><a href="welcome/show_student_course">我的课程</a></div>
        <div class="operating" id="feedback"><a href="welcome/feedback">信息反馈</a></div>

    </div>

    <?php include 'footer.php'?>

</div>

</body>
</html>