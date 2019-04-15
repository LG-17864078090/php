<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>首页</title>
    <link rel="stylesheet" href="css/commen.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <li class="main-memu now"><span id="index">首页</span></li>
        <li class="main-memu"><span id="reg" href="Welcome/reg/">注册</span></li>
        <li class="main-memu"><span id="login">登录</span></li>
        <li class="main-memu"><span id="about">关于</span></li>
        <li class="main-memu"><span id="contact">联系我们</span></li>

    </div>
    <div class="school">
        <div class="school-intr">
            <h3>学校简介</h3>
            <div>
                <?php echo $school_info->intro?>
            </div>
        </div>
        <div class="school-topic">
            <h3>公告</h3>
            <?php foreach ($announce_list as $announce){?>
                <li><?php echo $announce->title?></li>
            <?php }?>
        </div>


    </div>
    <div class="footer">© 学生学情管理系统</div>
</div>

<script src="js/jquery-1.12.4.js"></script>
<script>
    $('#index').on('click',function () {
        $.get('',{},function (data) {location.href = 'welcome/index'},'text')
    });
    $('#reg').on('click',function () {
        $.get('',{},function (data) {location.href = 'welcome/reg';},'text')
    });
    $('#login').on('click',function () {
        $.get('', {},function (data) {location.href = 'welcome/login';},'text')
    });
    $('#about').on('click',function () {
        $.get('',{},function (data) {location.href = 'welcome/about';},'text')
    });
    $('#contact').on('click',function () {
        $.get('',{},function (data) {location.href = 'welcome/contact_us';},'text')
    })
</script>

</body>
</html>