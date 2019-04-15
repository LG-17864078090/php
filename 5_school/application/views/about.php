<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>关于</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/about.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <li class="main-memu"><span id="index">首页</span></li>
        <li class="main-memu"><span id="reg">注册</span></li>
        <li class="main-memu"><span id="login">登录</span></li>
        <li class="main-memu now"><span id="about">关于</span></li>
        <li class="main-memu"><span id="contact">联系我们</span></li>
    </div>

    <div class="about">
        <div class="container">
            <P style="text-indent:2em;">孩子的教育问题一直是我国家长心中较为重要的事情，尤其是在校外的补课班，家长的关注度一直居高不下，所以，在众多的课外教辅机构中脱颖而出是每一家教育机构都尤为关心的事情。那么，在教学水平和教学环境相差无几的情况下什么才是一家教育机构吸引家长的闪光点呢——服务。<br>
            <P style="text-indent:2em;">目前哈市各大教育机构中都会有一大部分人和学生家长点对点的进行沟通、反馈。这是一个非常庞大的群体，这些人掌握着众多家长和学生的个人信息，对于教育机构来说这是非常有价值的商业资源，但是对于消费者来说这确实非常可怕的信息安全隐患。对此，如何才能在保证服务的同时又能增强个人信息的安全性成为了各家教育机构面临的首要问题。<br>
            <P style="text-indent:2em;">从服务方式来看，传统的教辅机构的服务方式无非是电话follow、KMC、约访沟通等，这样的服务方式无一例外都需要耗费巨大的人力、物力、财力开销，无论是消费者或者是服务者。那么一个全新的服务形式就成为了市场上最迫切需要的也是学生和家长最需要的;<br>
            <P style="text-indent:2em;">从竞争环境来看，现已有比较成熟的平台有“校管家”等，很多教辅机构都非常认可。但是这些都是较大型的网站平台，而且是需要付费才可以使用的，很多规模较小的补课班如果使用这类平台网站，他们的经营成本就会大大增加。所以对于这类规模较小的补课班和不想投入高成本的文化艺术学校来说，一个相对较小切成本较低的平台会更加受欢迎。<br>
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