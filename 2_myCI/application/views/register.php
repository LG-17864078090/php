<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <style>
        .error{
            color: red;
        }
    </style>
<!--设置路径,需更改autoload.php第92行(加入url)以及config.php第38行(删除引号内index.php)-->
    <base href="<?php echo site_url();?>">
</head>
<body>
        <form action="welcome/save" method="post">
            用户名: <input type="text" name="username" value="<?php echo isset($name)?$name:'' ?>">
            <span class="error"><?php echo isset($name_error)?$name_error:'' ?></span><br>
            密码: <input type="password" name="pwd1" value="<?php echo isset($pwd1)?$pwd1:'' ?>">
            <span class="error"><?php echo isset($pwd1_error)?$pwd1_error:'' ?></span><br>
            确认密码: <input type="password" name="pwd2" value="<?php echo isset($pwd2)?$pwd2:'' ?>">
            <span class="error"><?php echo isset($pwd2_error)?$pwd2_error:'' ?></span>
            <span class="error"><?php echo isset($pwd_error)?$pwd_error:'' ?></span><br>
            <input type="submit" name="注册">
        </form>
</body>
