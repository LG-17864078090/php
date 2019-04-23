<?php $user = $this->session->userdata('user')?>
<?php $user_work = $this->session->userdata('user_work')?>
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
        <?php if(isset($user)){?>
            <a href="welcome/<?php echo $user_work;?>_logined"><img class="set" src="images/set.png" alt=""></a>
        <?php }?>

        <li class="main-memu now"><span id="index">首页</span></li>
        <?php if(!isset($user)){?>
            <li class="main-memu"><span id="reg">注册</span></li>
            <li class="main-memu"><span id="login">登录</span></li>
        <?php }?>
        <li class="main-memu"><span id="about">关于</span></li>
        <li class="main-memu"><span id="contact">联系我们</span></li>
        <?php if(isset($user)){?>
            <span class="exit"><a href='user/logout'>[ 退出登录 ]</a></span>
        <?php }?>

    </div>
    <div class="school">
        <div class="school-intr">
            <?php include 'index_show_img.php'?>
            <h3>学校简介</h3>
            <div class="shcool-intro" style="padding: 0 10px 10px">
                <?php echo $school_info->intro?>
            </div>
        </div>
        <div class="school-topic">
            <h3>公告</h3>
            <?php foreach ($announce_list as $announce){?>

                <li><a href="welcome/announcement_detail/<?php echo $announce->id;?>"><?php echo $announce->title?></a></li>
            <?php }?>
        </div>


    </div>
    <?php include 'footer.php'?>
</div>

<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-session.js"></script>
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
    });

    $('.set').on('click',function () {
        var user = $.session.get('$user');
        console.log(  user  );

    })
</script>

</body>
</html>