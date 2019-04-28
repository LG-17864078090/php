<?php $user = $this->session->userdata('user')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>找回密码</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/find-password.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <li class="main-memu"><span id="index">首页</span></li>
        <li class="main-memu"><span id="reg">注册</span></li>
        <li class="main-memu"><span id="login">登录</span></li>
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

            <span class="tip">账 &nbsp;&nbsp;号:</span>
            <input type="text" class="input ID" placeholder=" 账号为学号或工号">
            <span class="warming id-error"> </span><br/>

            <span class="tip">手机号:</span>
            <input type="phone" class="input phone">
            <span class="warming phone-error"> </span><br/>

            <span class="tip">新密码:</span>
            <input type="password" class="input password">
            <span class="warming password-error"> </span><br/>

            <span class="tip">验证码:</span>
            <input type="text" class="input captcha">
            <span class="warming captcha-error"> </span><br/>

            <div class="captcha-img">
                <?php echo $captcha?>
            </div>


            <button id="findButton">找回密码</button>
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
    $('.phone').on('focus',function(){
        $('.phone-error').html('');
    });
    $('.password').on('focus',function(){
        $('.password-error').html('');
    });
    $('.captcha').on('focus',function(){
        $('.captcha-error').html('');
    });


    $('#findButton').on('click',function () {
        var ID = $('.ID').val();
        var phone = $('.phone').val();
        var captcha = $('.captcha').val();
        var password = $('.password').val();
        var flag = true;
        if(ID == ''){
            $('.id-error').html('用户名不能为空');
            flag = false;
        }else if(phone == ''){
            $('.phone-error').html('手机号不能为空');
            flag = false;
        }else if(password == ''){
            $('.password-error').html('新密码不能为空');
            flag = false;
        }else if(captcha == ''){
            $('.captcha-error').html('验证码不能为空');
            flag = false;
        }
        if(flag){
            for(let i=0; i<4; i++){
                if(document.getElementsByName('work')[i].checked==true){
                    if(i==0){
                        $.get('user/find_student_password',{
                            ID:ID,
                            phone:phone,
                            password:password,
                            code:captcha
                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/login';
                            }else if(data == 'id_error'){
                                $('.id-error').html('该用户不存在');
                            }else if(data == 'phone_error'){
                                $('.phone-error').html('手机号错误');
                            }else if(data == 'password_error'){
                                $('.password-error').html('密码格式错误');
                            }else if(data == 'captcha_error'){
                                $('.captcha-error').html('验证码错误');
                            }
                        },'text')

                    }
                    if(i==1){
                        $.get('user/find_parent_password',{
                            ID:ID,
                            phone:phone,
                            password:password,
                            code:captcha
                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/login';
                            }else if(data == 'id_error'){
                                $('.id-error').html('该用户不存在');
                            }else if(data == 'phone_error'){
                                $('.phone-error').html('手机号错误');
                            }else if(data == 'password_error'){
                                $('.password-error').html('密码格式错误');
                            }else if(data == 'captcha_error'){
                                $('.captcha-error').html('验证码错误');
                            }
                        },'text')

                    }
                    if(i==2){
                        $.get('user/find_teacher_password',{
                            ID:ID,
                            phone:phone,
                            password:password,
                            code:captcha
                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/login';
                            }else if(data == 'id_error'){
                                $('.id-error').html('该用户不存在');
                            }else if(data == 'phone_error'){
                                $('.phone-error').html('手机号错误');
                            }else if(data == 'password_error'){
                                $('.password-error').html('密码格式错误');
                            }else if(data == 'captcha_error'){
                                $('.captcha-error').html('验证码错误');
                            }
                        },'text')

                    }
                    if(i==3){
                        $.get('user/find_admin_password',{
                            ID:ID,
                            phone:phone,
                            password:password,
                            code:captcha
                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/login';
                            }else if(data == 'id_error'){
                                $('.id-error').html('该用户不存在');
                            }else if(data == 'phone_error'){
                                $('.phone-error').html('手机号错误');
                            }else if(data == 'password_error'){
                                $('.password-error').html('密码格式错误');
                            }else if(data == 'captcha_error'){
                                $('.captcha-error').html('验证码错误');
                            }
                        },'text')

                    }
                }
            }

        }

    });



    $('.captcha-img').on('click',function(){
        $.get('welcome/get_captcha',function(data){
            $('.captcha-img').html(data);
        },'text');
    })
</script>

</body>
</html>