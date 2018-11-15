<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: LG-->
<!-- * Date: 2018/10/14-->
<!-- * Time: 10:48-->
<!-- */-->

<?php
    $flag=true;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['username']=="admit"&&$_POST['pwd']=='123'){
            $flag=false;
        }
    }else{
        $flag=true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        if($flag){
    ?>
        <form action="9_login_self.php" method="post">
            用户名: <input type="text" name="username"><br>
            密码: <input type="password" name="pwd"><br>
            <input type="submit" name="登录">
        </form>
            <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    echo "用户名密码有误";
                }
            ?>
    <?php
        }else{
            echo "恭喜登录成功";
        }
    ?>
</body>
