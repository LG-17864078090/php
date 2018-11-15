<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: LG-->
<!-- * Date: 2018/10/14-->
<!-- * Time: 13:41-->
<!-- */-->
<!DOCTYPE html>
<html>
<head>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    用户名：<input type="text" id="username">
    <span class="error name-error"></span><br>
    密码：<input type="password" id="psw1">
    <span class="error psw1-error"></span><br>
    确认密码：<input type="password" id="psw2">
    <span class="error psw2-error"></span><br>
    <button id="res">注册</button>

    <script src="jquery-1.12.4.js"></script>
    <script>
        function clearError(){
            $('.name-error').html('');
            $('.psw1-error').html('');
            $('.psw2-error').html('');
            $('.psw2-error').html('');
        }
        $(function () {
           $('#res').click(function () {
               var username = $('#username').val();
               var psw1 = $('#psw1').val();
               var psw2 = $('#psw2').val();
               $.get('10_server.php', {
                   name:username,
                   p1:psw1,
                   p2:psw2
               },function (data) {
                   clearError();
                   if(data == 'nameError'){
                       $('.name-error').html('用户名不能为空');
                   }else if(data == 'psw1Error'){
                       $('.psw1-error').html('密码不能为空');
                   }else if(data == 'psw2Error'){
                       $('.psw2-error').html('确认密码不能为空');
                   }else if(data == 'pswError'){
                       $('.psw2-error').html('两次密码不一致');
                   }else{
                       console.log(data);
                   }
               },'text')
           })
        })

    </script>

</body>
</html>