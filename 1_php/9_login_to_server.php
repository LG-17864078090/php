<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: LG-->
<!-- * Date: 2018/10/14-->
<!-- * Time: 9:30-->
<!-- */-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<!--GET方式-->
<!--    <form action="9_server.php" method="get">-->
<!--        用户名: <input type="text" name="username">-->
<!--        密码: <input type="password" name="pwd">-->
<!--        <input type="submit" name="登录">-->
<!--    </form>-->


<!--POST方式-->
    <form action="9_server.php" method="post">
        用户名: <input type="text" name="username"><br>
        密码: <input type="password" name="pwd"><br>
        性别：<input type="radio" name="sex" value="m">男
        <input type="radio" name="sex" value="f">女<br>

        爱好：<input type="checkbox" name="hobby[]" value="篮球">篮球
        <input type="checkbox" name="hobby[]" value="足球">足球
        <input type="checkbox" name="hobby[]" value="排球">排球<br>

<!--    加 ‘multiple="multiple"’ 为下拉多选列表，此时name应改为数组-->
        <select name="school">
            <option value="黑大">黑大</option>
            <option value="林大">林大</option>
            <option value="农大">农大</option>
            <option value="理工">理工</option>
        </select>

        <input type="submit" name="登录">
    </form>
</body>
</html>

<!--//GET  POST  PUT  DELETE  HEAD-->
