<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>注册</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/reg.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <li class="main-memu"><span id="index">首页</span></li>
        <li class="main-memu now"><span id="reg">注册</span></li>
        <li class="main-memu"><span id="login">登录</span></li>
        <li class="main-memu"><span id="about">关于</span></li>
        <li class="main-memu"><span id="contact">联系我们</span></li>
    </div>

    <div class="reg">
        <div class="container">
            <div class="select-work">
                <input name="work" type="radio" value="学生"><span>学生</span>
                <input name="work" type="radio" value="家长"><span>家长</span>
                <input name="work" type="radio" value="老师"><span>老师</span>
                <input name="work" type="radio" value="管理员"><span>管理员</span>
            </div>


            <div class="student">
                <span class="tip job">学号:</span>
                <input type="text" class="input ID">
                <span class="warming id-error"> </span><br/>
                <span class="tip">密码:</span>
                <input type="password" class="input password">
                <span class="warming password-error"> </span><br/>
                <span class="tip">确认密码:</span>
                <input type="password" class="input password1">
                <span class="warming password1-error"> </span><br/>
                <span class="tip">姓名:</span>
                <input type="text" class="input name">
                <span class="warming name-error"> </span><br/>
                <span class="tip">性别:</span>
                <input type="radio" name="sex" value="男">男 <input type="radio" name="sex" value="女">女
                <span class="warming sex-error"> </span><br/>
                <span class="tip">手机号:</span>
                <input type="text" class="input phone">
                <span class="warming phone-error"> </span><br/>
                <span class="tip">家庭住址:</span>
                <input type="text" class="input address"><br/>

                <div class="help">
                    <span class="tip">教师工号:</span>
                    <input type="text" class="input checkTeacherID">
                    <span class="warming teacherID-error"> </span><br/>
                </div>

            </div>

            <button id="regButton">注册</button>
            <p>tip: 学生与家长注册的需要老师辅助验证</p>
        </div>
    </div>


    <div class="footer">© 学生学情管理系统</div>

</div>
<script src="js/jquery-1.12.4.js"></script>
<script>
    $(document).ready(function() {
        var work = '';
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







        $('.ID').on('blur',function () {
            if(work=='学生'){
                $.get('user/checkStudentID',{
                    ID:$(this).val()
                },function (data) {
                    if(data=='fail'){
                        $('.id-error').html('该ID已被注册');
                        $('.id-error').show();
                    }else{
                        $('.id-error').html('✔');
                        $('.id-error').show();
                    }
                },'text')
            }else if(work=='家长'){
                $.get('user/checkParentID',{
                    ID:$(this).val()
                },function (data) {
                    if(data=='fail'){
                        $('.id-error').html('该ID已被注册');
                        $('.id-error').show();
                    }else{
                        $('.id-error').html('✔');
                        $('.id-error').show();
                    }
                },'text')

            }else if(work=='老师'){
                $.get('user/checkTeacherID',{
                    ID:$(this).val()
                },function (data) {
                    if(data=='fail'){
                        $('.id-error').html('该ID已被注册');
                        $('.id-error').show();
                    }else{
                        $('.id-error').html('✔');
                        $('.id-error').show();
                    }
                },'text')
            }else if(work=='管理员'){

            }

        });

        $('.ID').on('focus',function(){
            $('.id-error').html('');
        });

        $('.password').on('focus',function(){
            $('.password1-error').html('');
        });

        $('.password1').on('focus',function(){
                $('.password1-error').html('');
        });

        $('.phone').on('focus',function(){
            $('.phone-error').html('');
        });

        $('.checkTeacherID').on('focus',function(){
            $('.teacherID-error').html('');
        });



        //表单提交
        $('#regButton').on('click',function () {
            let ID = $('.ID').val();
            let password = $('.password').val();
            let password1 = $('.password1').val();
            let name = $('.name').val();
            let sex = $('[name="sex"]:checked').val();
            let phone = $('.phone').val();
            let address = $('.address').val();
            let helpTeacherID = $('.checkTeacherID').val();

            //前端验证
            let flag = true;
            if(ID == ''){
                $('.id-error').html('账号不能为空');
                flag=false;
            }
            if(password == ''){
                $('.password-error').html('密码不能为空');
                flag=false;
            }else if(password != password1){
                $('.password-error1').html('两次密码不一致');
                flag=false;
            }
            if(name == ''){
                $('.name-error').html('姓名不能为空');
                flag=false;
            }
            if(!sex){
                $('.sex-error').html('请选择性别');
                flag=false;
            }
            if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone))){
                $('.phone-error').html('手机号格式有误');
                flag=false;
            }
            if((helpTeacherID == ''&&work=='学生')||(helpTeacherID == ''&&work=='家长')){
                $('.teacherID-error').html('教师ID不能为空');
                flag=false;
            }


            if(work=='学生'){
                if(flag){
                    $.get('user/save_student_massage',{
                        studentID:ID,
                        password:password,
                        name:name,
                        sex:sex,
                        phone:phone,
                        address:address,
                        teacherID:helpTeacherID
                    },function (data) {
                        if(data == 'success'){
                            location.href = 'welcome/reg_success';
                        }else if(data == 'id_error'){
                            $('.id-error').html('该ID已被注册');
                        }else if(data == 'name_error'){
                            $('.name-error').html('姓名不能为空');
                        }else if(data == 'password_error'){
                            $('.password-error').html('密码不能为空');
                        }else if(data == 'sex_error'){
                            $('.sex-error').html('请选择性别');
                        }
                    },'text')

                }
            }else if(work=='家长'){
                if(flag){
                    $.get('user/save_parent_massage',{
                        childID:ID,
                        password:password,
                        name:name,
                        sex:sex,
                        phone:phone,
                        address:address,
                        teacherID:helpTeacherID
                    },function (data) {
                        if(data == 'success'){
                            location.href = 'welcome/reg_success';
                        }else if(data == 'id_error'){
                            $('.id-error').html('该ID已被注册');
                        }else if(data == 'name_error'){
                            $('.name-error').html('姓名不能为空');
                        }else if(data == 'password_error'){
                            $('.password-error').html('密码不能为空');
                        }else if(data == 'sex_error'){
                            $('.sex-error').html('请选择性别');
                        }
                    },'text')
                }
            }else if(work=='老师'){
                if(flag){
                    $.get('user/save_teacher_massage',{
                        teacherID:ID,
                        password:password,
                        name:name,
                        sex:sex,
                        phone:phone,
                        address:address,
                    },function (data) {
                        if(data == 'success'){
                            location.href = 'welcome/teacher_logined';
                        }else if(data == 'id_error'){
                            $('.id-error').html('该ID已被注册');
                        }else if(data == 'name_error'){
                            $('.name-error').html('姓名不能为空');
                        }else if(data == 'password_error'){
                            $('.password-error').html('密码不能为空');
                        }else if(data == 'sex_error'){
                            $('.sex-error').html('请选择性别');
                        }
                    },'text')
                }


            }else if(work=='管理员'){

            }



        });












































        $('.student').hide();

        $('input[type=radio][name=work]').change(function() {
            $('.student').show();

            if (this.value == '学生') {
                $('.job').text('学 号:');
                $('.help').show();
            }else if (this.value == '家长') {
                $('.job').text('学 号:');
                $('.help').show();
            }else if (this.value == '老师') {
                $('.job').text('工 号:');

                $('.help').hide();
            }else if (this.value == '管理员') {
                $('.job').text('账 号:');
                $('.help').hide();
            }
            work=this.value;
        });
    });
</script>
</body>
</html>