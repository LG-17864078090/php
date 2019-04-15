<?php $user = $this->session->userdata('user')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>联系我们</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/contact-us.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <li class="main-memu"><span id="index">首页</span></li>
        <?php if(!isset($user)){?>
            <li class="main-memu"><span id="reg">注册</span></li>
            <li class="main-memu"><span id="login">登录</span></li>
        <?php }?>

        <li class="main-memu"><span id="about">关于</span></li>
        <li class="main-memu now"><span id="contact">联系我们</span></li>
        <?php if(isset($user)){?>
            <span class="exit"><a href='user/logout'>[ 退出登录 ]</a></span>
        <?php }?>
    </div>

    <div class="contact-us">
        <div class="container">
            <span>作者：XXX</span><br/>
            <span>电话：1234567890</span><br/>
            <img src="images/weixin.jpg" title="扫一扫，添加微信">
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