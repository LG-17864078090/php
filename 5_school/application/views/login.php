<?php $user = $this->session->userdata('user')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>登录</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <li class="main-memu"><span id="index">首页</span></li>
        <li class="main-memu"><span id="reg">注册</span></li>
        <li class="main-memu now"><span id="login">登录</span></li>
        <li class="main-memu"><span id="about">关于</span></li>
        <li class="main-memu"><span id="contact">联系我们</span></li>
    </div>

    <div class="login">
        <div class="container">
            <div class="select-work">
                <input name="work" type="radio" value="学生"><span>学生</span>
                <input name="work" type="radio" value="家长"><span>家长</span>
                <input name="work" type="radio" value="老师"><span>老师</span>
                <input name="work" type="radio" value="管理员"><span>管理员</span>
            </div>

            <span class="tip">账号:</span>
            <input type="text" class="input ID" placeholder=" 账号为学号或工号">
            <span class="warming id-error"> </span><br/>
            <span class="tip">密码:</span>
            <input type="password" class="input password">
            <span class="warming password-error"> </span><br/>
            <button id="loginButton">登录</button>
            <a href="welcome/find_password">找回密码</a>
        </div>

    </div>

    <?php include 'footer.php'?>

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
    });


    $('.ID').on('focus',function(){
        $('.id-error').html('');
    });
    $('.password').on('focus',function(){
        $('.password-error').html('');
    });

    $('#loginButton').on('click',function () {
        var ID = $('.ID').val();
        var password = $('.password').val();
        var flag = true;
        if(ID == ''){
            $('.id-error').html('用户名不能为空');
            flag = false;
        }else if(password == ''){
            $('.password-error').html('密码不能为空');
            flag = false;
        }
        if(flag){
            for(let i=0; i<4; i++){
                if(document.getElementsByName('work')[i].checked==true){
                    if(i==0){
                        $.get('user/student_login_check',{
                            ID:ID,
                            password:password
                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/student_logined';
                            }else if(data == 'id_error'){
                                $('.id-error').html('该用户不存在');
                            }else if(data == 'password_error'){
                                $('.password-error').html('密码错误');
                            }
                        },'text')

                    }
                    if(i==1){
                        $.get('user/parent_login_check',{
                            ID:ID,
                            password:password
                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/parent_logined';
                            }else if(data == 'id_error'){
                                $('.id-error').html('该用户不存在');
                            }else if(data == 'password_error'){
                                $('.password-error').html('密码错误');
                            }
                        },'text')

                    }
                    if(i==2){
                        $.get('user/teacher_login_check',{
                            ID:ID,
                            password:password
                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/teacher_logined';
                            }else if(data == 'id_error'){
                                $('.id-error').html('该用户不存在');
                            }else if(data == 'password_error'){
                                $('.password-error').html('密码错误');
                            }
                        },'text')

                    }
                    if(i==3){
                        $.get('user/admin_login_check',{
                            ID:ID,
                            password:password
                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/administrator_logined';
                            }else if(data == 'id_error'){
                                $('.id-error').html('该用户不存在');
                            }else if(data == 'password_error'){
                                $('.password-error').html('密码错误');
                            }
                        },'text')

                    }
                }
            }

        }

    })
</script>

</body>
</html>