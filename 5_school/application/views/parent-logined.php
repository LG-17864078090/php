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
        <div class="search">
            <input type="text" placeholder="在公告中查询你想要的通知"><button>搜索</button>
        </div>

        <div class="operating" id="info">个人信息查询</div>
        <div class="operating" id="grade">个人成绩查询</div>
        <div class="operating" id="feedback">信息反馈</div>

    </div>

    <div class="footer">© 学生学情管理系统</div>

</div>
<script src="js/jquery-1.12.4.js"></script>
<script>
    $('#info').on('click',function () {
        $.get('', {},function (data) {location.href = 'welcome/show_info';},'text')
    });
    $('#grade').on('click',function () {
        $.get('', {},function (data) {location.href = 'welcome/show_course';},'text')
    })
    $('#feedback').on('click',function () {
        $.get('', {},function (data) {location.href = 'welcome/feedback';},'text')
    })

</script>


</body>
</html>